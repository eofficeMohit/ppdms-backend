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
use App\Models\Event;
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
                $assemblyBooths =Booth::where('user_id',$user->id)->pluck('booth_no')->implode(',');

                $success['user_image'] = asset('assets/img/next-gen.png') ?? asset('public/assets/img/next-gen.png');
                $success['user_name'] = rtrim($user->name," ") ?? '';
                $success['state'] = $user->userState->name ?? '';
                $success['district'] = $user->userDistrict->name ?? '';
                $success['assemblies'] = $user->userAssemblies->asmb_name ?? '';
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

                $user = User::find($token->tokenable_id);
                $userBooths =Booth::where('user_id',$user->id)->get();


                foreach($userBooths as $userBooth){
                    $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly'])
                    ->where('booth_id',$userBooth->id)->where('assemble_id',$userBooth->assemble_id)->where('state_id',$userBooth->state_id)
                    ->where('district_id',$userBooth->district_id)->latest()->first();

                    if(!empty($electionInfo)){
                        $event_id=$electionInfo->event_id;
                        $event_status=$electionInfo->status;
                    }else{
                        $event_id='';
                        $event_status='';
                    }

                    $success[]=array(
                        'id'=>$userBooth->id,
                        'booth_no'=>$userBooth->booth_no,
                        'booth_name'=>$userBooth->booth_name,
                        'assemble_id'=>$userBooth->assemble_id,
                        'state_id'=>$userBooth->state_id,
                        'district_id'=>$userBooth->district_id,
                        'event_id'=>$event_id ?? '',
                        'event_status'=>$event_status ?? '',
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
    public function getEvents(Request $request): JsonResponse
    {
        try {
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                $events = Event::orderby('event_sequence')->get();

                foreach($events as $event){
                    $updatedEvents =ElectionInfo::where('event_id',$event->id)->where('status',1)->count();
                    $notUpdatedEvents =ElectionInfo::where('event_id',$event->id)->where('status',0)->count();
                    $success[]=array(
                        'event_id'=>$event->id,
                        'event_name'=>$event->event_name,
                        'event_sequence'=>$event->event_sequence,
                        'status'=>$event->status,
                        'start_date_time'=>$event->start_date_time,
                        'end_date_time'=>$event->end_date_time,
                        'updated_events'=>$updatedEvents,
                        'not_updated_events'=>$notUpdatedEvents,
                    );
                }              
                return $this->sendResponse($success, 'All Events.');
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
    public function eventUpdate(Request $request): JsonResponse
    {
        try {
          
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                  /* Validate event Data */
                    $validator = Validator::make($request->all(), [
                        'state_id' => 'required|numeric|exists:states,id',
                        'district_id' => 'required|numeric|exists:districts,id',
                        'booth_id' => 'required|numeric|exists:booths,id',
                        'assemble_id' => 'required|numeric|exists:assemblies,id',
                        'event_id' => 'required|numeric|exists:events,id',
                        'status'=>'required|numeric|in:0,1'
                    ]);

                    if($validator->fails()){
                        return $this->sendError('Validation Error.', $validator->errors());
                    }

                    // $check_booth_user=Booth::where('user_id',$token->tokenable_id)->exists();
                    
                    // if($check_booth_user===true){
                    //     dd('yes');
                    // }else{
                    //     dd('no');
                    // }

                $data = $request->all();
                if($request->event_id > 1){
                    $check_next_event =ElectionInfo::where('event_id',$request->event_id++)->where('status',1)->exists();
                    if($check_next_event ===true){
                        return $this->sendError('Validation Error.', 'Previous event is already locked you cannot procced with this event now.');
                    }
    
                    // $check_previous_event =ElectionInfo::where('event_id',$request->event_id--)->where('status',0)->exists();
                    // if($check_previous_event ===false){
                    //     return $this->sendError('Validation Error.', 'Previous event is not completed yet, you cannot preceed further.');
                    // }
                }
             
                $data = ElectionInfo::create($data);
              
                $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly','electionEvent'])->find($data->id);


                $success['events']['state_name']=$electionInfo->electionState->name;
                $success['events']['district_name']=$electionInfo->electionDistrict->name;
                $success['events']['assemble_name']=$electionInfo->electionAssembly->asmb_name;
                $success['events']['booth_name']=$electionInfo->electionBooth->booth_name;
                $success['events']['event_name']=$electionInfo->electionEvent->event_name;
                $success['events']['event_status']=$electionInfo->status;
                $success['events']['ac_type']=$electionInfo->electionAssembly->ac_type;
                $success['events']['st_code']=$electionInfo->electionState->st_code;
                $success['events']['asmb_code']=$electionInfo->electionAssembly->asmb_code;
                
                return $this->sendResponse($success, 'Event updated successfully.');
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }

}
