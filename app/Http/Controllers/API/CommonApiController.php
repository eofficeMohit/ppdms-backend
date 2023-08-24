<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests;
use App\Models\User;
use App\Models\UserOtp;
use App\Models\Booth;
use App\Models\UserLogin;
use App\Models\ElectionInfo;
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

                $user = User::with(['userAssemblies','userState','userDistrict'])->find($token->tokenable_id);
                $assemblyBooths =Booth::where('user_id',$user->id)->take(10)->pluck('id')->implode(',');

                $success['user_image'] = asset('assets/img/favicon.jpeg') ?? asset('public/assets/img/favicon.jpeg');
                $success['user_name'] = rtrim($user->name," ");
                $success['state'] = $user->userState->name;
                $success['district'] = $user->userDistrict->name;
                $success['assemblies'] = $user->userAssemblies->asmb_name;
                $success['assembly_booths'] = $assemblyBooths;
                return $this->sendResponse($success, 'User profile-details.');
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }


     /**
     * User profile api
     *
     * @return \Illuminate\Http\Response
     */
    public function getBooths(Request $request): JsonResponse
    {
        try {
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                $user = User::with(['userAssemblies','userState','userDistrict'])->find($token->tokenable_id);
                $userBooths =Booth::where('user_id',$user->id)->get();
                $success=array();
                foreach($userBooths as $userBooth){
                    $success[]=array(
                        'booth_no'=>$userBooth->booth_no,
                        'booth_name'=>$userBooth->booth_name,
                    );
                }

                return $this->sendResponse($success, 'User all booths.');
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }

    /**
     * User profile api
     *
     * @return \Illuminate\Http\Response
     */
    public function partyDispatch(Request $request): JsonResponse
    {
        try {
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                  /* Validate Login Data */
                    $validator = Validator::make($request->all(), [
                        'state_id' => 'required|numeric|exists:states,id',
                        'district_id' => 'required|numeric|exists:districts,id',
                        'booth_id' => 'required|numeric|exists:booths,id',
                        'assemble_id' => 'required|numeric|exists:assemblies,id',
                        'is_party_dispatch' => 'required|in:0,1'
                    ]);

                    if($validator->fails()){
                        return $this->sendError('Validation Error.', $validator->errors());
                    }

                $data = $request->all();
                $data['dispatch_last_updated'] = now();

                $data = ElectionInfo::create($data);

                $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly'])->find($data->id);

                $success['access_token']=$hashedTooken;
                $success['state_id']=$data->electionState->name;
                $success['district_id']=$data->electionDistrict->name;
                $success['booth_id']=$data->electionBooth->booth_name;
                $success['assemble_id']=$data->electionAssembly->asmb_name;
                if($data->is_party_dispatch == 1){
                    $success['is_party_dispatch']=  'Yes';
                }else{
                    $success['is_party_dispatch']=  'No';
                }
                $success['dispatch_last_updated']=$data->dispatch_last_updated;
                $success['updated_at']=$data->updated_at;
                $success['created_at']=$data->created_at;
                return $this->sendResponse($success, 'Party dispatched successfully.');
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }

}
