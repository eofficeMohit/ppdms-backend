<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;
use App\Models\Booth;
use App\Models\Event;
use App\Models\ElectionInfo;
use App\Models\EventTimeslot;
use App\Models\PolledDetail;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use DateTime;

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

                 /* Validate event Data */
                 $validator = Validator::make($request->all(), [
                    'event_id' => 'required|numeric|exists:events,id'
                ]);

                if($validator->fails()){
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $user = User::find($token->tokenable_id);
                $userBooths =Booth::where('user_id',$user->id)->get();
                $success=array();
                foreach($userBooths as $userBooth){
                        $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly'])
                        ->where('booth_id',$userBooth->id)->where('assemble_id',$userBooth->assemble_id)->where('state_id',$userBooth->state_id)
                        ->where('district_id',$userBooth->district_id)->where('event_id',$request->event_id)->latest()->first();

                    if(!empty($electionInfo)){
                        $event_id=$electionInfo->event_id;
                        $event_status=$electionInfo->status;
                    }
                    else{
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
                $success=array();

                if(count($events) == 0){
                    return $this->sendResponse($success, 'No, event found.');
                }
                $booth_count=Booth::where('user_id',\Auth::id())->count();
                foreach($events as $event){

                    $updatedEvents =ElectionInfo::where('event_id',$event->id)->where('user_id',\Auth::id())->where('status',1)->count();

                    $notUpdatedEventCount= $booth_count - $updatedEvents;

                    $success[]=array(
                        'event_id'=>$event->id,
                        'event_name'=>$event->event_name,
                        'event_sequence'=>$event->event_sequence,
                        'status'=>$event->status,
                        'start_date_time'=>$event->start_date_time,
                        'end_date_time'=>$event->end_date_time,
                        'updated_events'=>$updatedEvents,
                        'not_updated_events'=>$notUpdatedEventCount,
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
        // dd(ElectionInfo::where('event_id',$request->event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->where('status',1)->count());
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
                   $check_user_booth= Booth::where('user_id',\Auth::id())->where('id',$request->booth_id)->exists();
                   $success=array();
                   if($check_user_booth === true){
                        $data = $request->all();
                            //next event check
                            $next_event_id=$request->event_id+1;
                            $check_next_event =ElectionInfo::where('event_id',$next_event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->where('status',1)->exists();
                            if($check_next_event ===true){
                                $get_next_event =ElectionInfo::with('electionEvent')->where('event_id',$next_event_id)->where('user_id',\Auth::id())->where('status',1)->first();
                                $message=$get_next_event->electionEvent->event_name.' status already updated(yes)!';
                                return $this->sendError('Warning!', $message);
                            }

                            //previous event check
                            if($request->event_id > '1'){
                                $previous_event_id=$request->event_id-1;
                                $check_previous_event =ElectionInfo::where('event_id',$previous_event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->where('status',1)->exists();
                                if($check_previous_event ===false){
                                    $get_previous_event =Event::where('id',$previous_event_id)->where('status',1)->first();
                                    $message=$get_previous_event->event_name.' status not updated(no)!';
                                    return $this->sendError('Warning!', $message);
                                }
                            }

                            if($request->has('event_id') && $request->event_id=='4'){

                                $validator = Validator::make($request->all(), [
                                    'mock_poll_status' => 'required|numeric|in:0,1',
                                    'evm_cleared_status' => 'required|numeric|in:0,1',
                                    'vvpat_cleared_status'=>'required|numeric|in:0,1'
                                ]);

                                if($validator->fails()){
                                    return $this->sendError('Validation Error.', $validator->errors());
                                }

                                if($request->mock_poll_status=='1' && $request->evm_cleared_status=='1' && $request->vvpat_cleared_status=='1'){
                                    $data['status']=1;
                                }else{
                                    $data['status']=0;
                                }

                                // if($request->mock_poll_status=='1' && $request->evm_cleared_status=='1' && $request->vvpat_cleared_status=='1'){
                                //     $data['status']=4;
                                // }
                                // elseif($request->mock_poll_status=='1' && $request->evm_cleared_status=='0' && $request->vvpat_cleared_status=='0'){
                                //     $data['status']=1;
                                // }elseif($request->mock_poll_status=='1' && $request->evm_cleared_status=='1' && $request->vvpat_cleared_status=='0'){
                                //     $data['status']=2;
                                // }elseif($request->mock_poll_status=='1' && $request->evm_cleared_status=='0' && $request->vvpat_cleared_status=='1'){
                                //     $data['status']=3;
                                // }
                            }

                            if($request->has('event_id') &&  $request->event_id=='6'){

                                $selected_slot="";
                                $get_event_timeSlots= EventTimeslot::where('event_id','6')->where('status','1')->get();

                                // timeslot occurence
                                foreach ($get_event_timeSlots as $key => $timeSlot) {

                                    $dt = new DateTime();
                                    $current_time = $dt->format('H:i:s');

                                    if($timeSlot->start_time < $current_time && $current_time <=$timeSlot->end_time){
                                        $selected_slot=$timeSlot->end_time;
                                        // echo 'Event occur in '.($timeSlot->end_time).' slot.</br>';
                                    }
                                }
                                $user_booth=Booth::with('assembly')->where('user_id',\Auth::id())->where('id',$request->booth_id)->first();
                                $poll_details=PolledDetail::with(['polledAssembly','polledBooth'])->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)
                                ->where('assemble_id',$request->assemble_id)->latest()->first();
                                $total_vote_polled = PolledDetail::where('user_id',\Auth::id())->where('id',$request->booth_id)
                                        ->where('assemble_id',$request->assemble_id)->sum('vote_polled');
                                if(!empty($selected_slot)){
                                    $success['events']['assembly_name']=$user_booth->assembly->asmb_name ?? '';
                                    $success['events']['booth_name']=$user_booth->booth_name;
                                    $success['events']['total_voters']=$user_booth->tot_voters ?? '';
                                    $success['events']['last_vote_polled']=$total_vote_polled ?? '';
                                    $success['events']['last_vote_polled_time']=$poll_details ? $poll_details->date_time_received->format('h:i a') : '';
                                    $success['events']['votes_polled_till']=$selected_slot ?? 'Slot not available';

                                    return $this->sendResponse($success, 'Event occurs in '.$selected_slot.' time slot.');
                                }else{
                                    return $this->sendResponse($success, 'No,slot available.');
                                }
                            }



                            if($request->has('event_id') && $request->event_id=='7'){

                                $user_booth=Booth::with('assembly')->where('user_id',\Auth::id())->where('id',$request->booth_id)->first();
                                $poll_details=PolledDetail::with(['polledAssembly','polledBooth'])->where('user_id',\Auth::id())
                                ->where('booth_id',$request->booth_id)->where('assemble_id',$request->assemble_id)->latest()->first();
                                $total_vote_polled = PolledDetail::where('user_id',\Auth::id())->where('booth_id',$request->booth_id)
                                        ->where('assemble_id',$request->assemble_id)->sum('vote_polled');
                                $date_time_received="";
                                if(!empty($poll_details)){
                                    $date_time_received =\Carbon\Carbon::parse($poll_details->date_time_received);
                                    $date_time_received =$date_time_received->format('h:i a');
                                }else{
                                    $date_time_received =\Carbon\Carbon::now()->format('h:i a');
                                }
                                $success['events']['assembly_name']=$user_booth->assembly->asmb_name ?? '';
                                $success['events']['booth_name']=$user_booth->booth_name;
                                $success['events']['total_voters']=$user_booth->tot_voters ?? '';
                                $success['events']['votes_polled']=$total_vote_polled ?? '';
                                $success['events']['remaining_votes']=$poll_details ? ($poll_details->polledBooth->tot_voters - $total_vote_polled) : '';
                                $success['events']['last_updated']=$date_time_received ? $date_time_received : '';

                                return $this->sendResponse($success, 'Event details for voter queue.');
                            }


                        $data['user_id']=\Auth::id();
                        $check_event_exists=ElectionInfo::where('event_id',$request->event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->exists();

                        if($check_event_exists === true){
                            ElectionInfo::where('event_id',$request->event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->update(array('status' => $request->status));
                            $get_id=ElectionInfo::where('event_id',$request->event_id)->where('user_id',\Auth::id())->where('booth_id',$request->booth_id)->where('status',$request->status)->pluck('id')->first();
                        }else{
                            $data = ElectionInfo::create($data);
                            $get_id = $data->id;
                        }
                        $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly','electionEvent'])->find($get_id);

                        $success['events']['state_name']=$electionInfo->electionState->name ?? "";
                        $success['events']['district_name']=$electionInfo->electionDistrict->name ?? "";
                        $success['events']['assemble_name']=$electionInfo->electionAssembly->asmb_name ?? "";
                        $success['events']['booth_name']=$electionInfo->electionBooth->booth_name ?? "";
                        $success['events']['event_name']=$electionInfo->electionEvent->event_name ?? "";
                        $success['events']['event_status']=$electionInfo->status ?? "";
                        $success['events']['ac_type']=$electionInfo->electionAssembly->ac_type ?? "";
                        $success['events']['st_code']=$electionInfo->electionState->st_code ?? "";
                        $success['events']['asmb_code']=$electionInfo->electionAssembly->asmb_code ?? "";

                        return $this->sendResponse($success, 'Event updated successfully.');

                    }
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }

    public function updateTurnoutAndQueue(Request $request): JsonResponse
    {
        try {
            if($request->bearerToken()){
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                 /* Validate event Data */
                $validator = Validator::make($request->all(), [
                                    'voting' => 'required|numeric',
                                    'event_id' => 'required|in:6,7',
                                    'state_id' => 'required|numeric|exists:states,id',
                                    'district_id' => 'required|numeric|exists:districts,id',
                                    'booth_id' => 'required|numeric|exists:booths,id',
                                    'assemble_id' => 'required|numeric|exists:assemblies,id',
                                    // 'event_id' => 'required|numeric|exists:events,id',
                                ]);

                $data = $request->all();
                $data['user_id']=\Auth::id();
                $success[]=array();

                if($request->has('event_id') && $request->event_id=='6'){
                    $data['date_time_received']=now();
                    $data['ip_address'] =trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
                    $data['ip_host']=request()->ip();


                    if(Carbon::now()->format('h:i:s') > '06:00:00'){
                        $total_vote_polled = PolledDetail::where('user_id',\Auth::id())->where('booth_id',$request->booth_id)
                                        ->where('assemble_id',$request->assemble_id)->sum('vote_polled');
                        $data['voting']=$total_vote_polled;
                        $data['voting_last_updated']=now();
                        $data['status']=1;
                        $data = ElectionInfo::create($data);
                        $success=$data;
                    }else{
                        $data['vote_polled']=$request->voting;
                        $data = PolledDetail::create($data);
                        $success=$data;
                    }

                    return $this->sendResponse($success, 'Detail updated successfully.');
                }

                if($request->has('event_id') && $request->event_id=='7'){
                    $data['voting_last_updated']=now();
                    $data['status']=1;
                    $data = ElectionInfo::create($data);
                    $success=$data;
                    return $this->sendResponse($success, 'Event updated successfully.');
                }


                if($validator->fails()){
                    return $this->sendError('Validation Error.', $validator->errors());
                }
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
        }
    }
}
