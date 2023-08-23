<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class CommonApiController extends BaseController
{
    /**
     * User profile api
     *
     * @return \Illuminate\Http\Response
     */
    public function userProfile(Request $request): JsonResponse
    {
        try {
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                $user = User::
                with(['userBooths'])->find($token->tokenable_id);
                dd($user);
            }

          } catch (\Exception $e) {
              return $e->getMessage();
          }

        return $this->sendResponse($success, 'User register successfully.');

        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }
    /**
     * Validate Mobile api
     *
     * @return \Illuminate\Http\Response
     */
    public function ValidateMobile(Request $request): JsonResponse
    {
         /* Validate Login Data */
         $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|numeric|digits:10'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        /* Generate An OTP */
        $userOtp = $this->generateOtp($request->mobile_number);
        /* Send An OTP */
        // $userOtp->sendSMS($request->mobile_no);
        if($userOtp){
            // dd($userOtp['id']);
            unset($userOtp['id']);
            $success['userOtp'] =  $userOtp;

            return $this->sendResponse($success, 'Otp generated successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    /**
     * Validate Mobile api
     *
     * @return \Illuminate\Http\Response
     */
    public function ValidateMobileOtp(Request $request): JsonResponse
    {
        /* Validate Login Data */
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'otp' => 'required|numeric|digits:6',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'ip_address' => 'required|ipv4',
            'login_type' => 'required|in:web,app',
            'device_type' => 'required',
            'device_token' => 'required',
            'device_mac_address'=>'required|mac_address',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        /* Login Details */
       $user_logins= UserLogin::create([
            'user_id' => $request->user_id,
            'latitude'=>$request->latitude,
            'longitude' =>$request->longitude,
            'ip_address' => $request->ip_address,
            'login_type' => $request->login_type,
            'device_type' => $request->device_type,
            'device_token' => $request->device_token,
            'device_mac_address'=> $request->device_mac_address
        ]);

        /* Validation Logic */
        $userOtp   = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();
        $now = now();
        if (!$userOtp) {
            return $this->sendError('Unauthorised.', ['error'=>'Your OTP is not correct']);
        }else if($userOtp && $now->isAfter($userOtp->expire_at)){
            return $this->sendError('Unauthorised.', ['error'=>'Your OTP has been expired']);
        }
        $user = User::whereId($request->user_id)->first();
        if($user){
            $userOtp->update([
                'expire_at' => now()
            ]);
            $user_logins->update([
                'status' => 1,
                'last_login' => now(),
            ]);
            Auth::login($user);
            $user = Auth::user();
            $success['access_token'] =  $user->createToken('auth_token')->plainTextToken;
            $success['token_type'] = 'Bearer';
            $success['mobile_number'] =  $user->mobile_number;
            return $this->sendResponse($success, 'User login successfully.');
        }else{
            $user_logins->update([
                'status' => 0
            ]);
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
     public function generateOtp($mobile_number)
     {
         $user = User::where('mobile_number', $mobile_number)->first();
         /* User Does not Have Any Existing OTP */
         $now = now();
         if(!empty($user)){
            $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
            if($userOtp && $now->isBefore($userOtp->expire_at)){
                return $userOtp;
            }
         }else{
            $user = User::create(['mobile_number' => $mobile_number]);
         }

         /* Create a New OTP */
         return UserOtp::create([
             'user_id' => $user->id,
             'mobile_number'=>$mobile_number,
             'otp' => rand(123456, 999999),
             'expire_at' => $now->addMinutes(10)
         ]);
     }

}
