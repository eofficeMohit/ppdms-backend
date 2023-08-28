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
                $assemblyBooths =Booth::where('user_id',$user->id)->take(10)->pluck('booth_no')->implode(',');

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

                $success=array();
                $is_party_dispatch="";
                foreach($userBooths as $userBooth){
                    $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly'])
                    ->where('booth_id',$userBooth->id)->where('assemble_id',$userBooth->assemble_id)->where('state_id',$userBooth->state_id)
                    ->where('district_id',$userBooth->district_id)->latest()->first();

                    if($electionInfo){
                        $is_party_reached=$electionInfo->is_party_reached;
                        $is_poll_started=$electionInfo->is_poll_started;
                        $is_poll_ended=$electionInfo->is_poll_ended;
                        $is_nopolling=$electionInfo->is_nopolling;
                        $is_party_dispatch=$electionInfo->is_party_dispatch;
                        $is_mockpoll_done=$electionInfo->is_mockpoll_done;
                        $voter_in_queue=$electionInfo->voter_in_queue;
                        $polling_party_left=$electionInfo->polling_party_left;
                        $evm_deposited=$electionInfo->evm_deposited;
                        $is_booth_capt=$electionInfo->is_booth_capt;
                        $is_law_prob=$electionInfo->is_law_prob;
                        $is_evm_prob=$electionInfo->is_evm_prob;
                        $is_mockpoll_clear=$electionInfo->is_mockpoll_clear;
                        $is_battery_removed=$electionInfo->is_battery_removed;
                        $is_evm_switch_off=$electionInfo->is_evm_switch_off;
                    }else{
                        $is_party_reached='false';
                        $is_poll_started='false';
                        $is_poll_ended='false';
                        $is_nopolling='false';
                        $is_party_dispatch='false';
                        $is_mockpoll_done='false';
                        $voter_in_queue='false';
                        $polling_party_left='false';
                        $evm_deposited='false';
                        $is_booth_capt='false';
                        $is_law_prob='false';
                        $is_evm_prob='false';
                        $is_mockpoll_clear='false';
                        $is_battery_removed='false';
                        $is_evm_switch_off='false';
                    }
                    $success[]=array(
                        'id'=>$userBooth->id,
                        'booth_no'=>$userBooth->booth_no,
                        'booth_name'=>$userBooth->booth_name,
                        'assemble_id'=>$userBooth->assemble_id,
                        'state_id'=>$userBooth->state_id,
                        'district_id'=>$userBooth->district_id,
                        'is_party_reached' => $is_party_reached,
                        'is_poll_started' => $is_poll_started,
                        'is_poll_ended' => $is_poll_ended,
                        'is_nopolling' => $is_nopolling,
                        'is_party_dispatch' => $is_party_dispatch,
                        'is_mockpoll_done' => $is_mockpoll_done,
                        'voter_in_queue' => $voter_in_queue,
                        'polling_party_left' => $polling_party_left,
                        'evm_deposited' => $evm_deposited,
                        'is_booth_capt' => $is_booth_capt,
                        'is_law_prob' => $is_law_prob,
                        'is_evm_prob' =>$is_evm_prob,
                        'is_mockpoll_clear' => $is_mockpoll_clear,
                        'is_battery_removed' =>$is_battery_removed,
                        'is_evm_switch_off' => $is_evm_switch_off,
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
                        'is_party_dispatch' =>'required_without_all:is_party_reached,is_poll_started,is_poll_ended,
                        is_nopolling,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_party_reached' => 'required_without_all:is_party_dispatch,is_poll_started,is_poll_ended,
                        is_nopolling,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_poll_started' =>'required_without_all:is_party_dispatch,is_party_reached,is_poll_ended,
                        is_nopolling,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_poll_ended' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_nopolling' =>  'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_poll_ended,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_mockpoll_done' =>  'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,voter_in_queue,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'voter_in_queue' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,polling_party_left,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'polling_party_left' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,evm_deposited,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'evm_deposited' =>  'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,is_booth_capt,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_booth_capt' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_law_prob' =>  'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_booth_capt,is_evm_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_evm_prob' =>'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_booth_capt,is_law_prob,is_mockpoll_clear,is_battery_removed,is_evm_switch_off',
                        'is_mockpoll_clear' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_booth_capt,is_law_prob,is_evm_prob,is_battery_removed,is_evm_switch_off',
                        'is_battery_removed' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_booth_capt,is_law_prob,is_evm_prob,is_mockpoll_clear,is_evm_switch_off',
                        'is_evm_switch_off' => 'required_without_all:is_party_dispatch,is_party_reached,is_poll_started,
                        is_nopolling,is_mockpoll_done,is_poll_ended,voter_in_queue,polling_party_left,evm_deposited,
                        is_booth_capt,is_law_prob,is_evm_prob,is_mockpoll_clear,is_battery_removed',
                    ]);

                    if($validator->fails()){
                        return $this->sendError('Validation Error.', $validator->errors());
                    }

                $data = $request->all();
               if(\Request::exists('is_party_dispatch')){
                    $data['dispatch_last_updated'] = now();
               }
               if(\Request::exists('is_party_reached')){
                    $data['reached_last_updated'] = now();
                }
                if(\Request::exists('is_poll_started')){
                    $data['started_last_updated'] = now();
                }
                if(\Request::exists('is_poll_ended')){
                    $data['ended_last_updated'] = now();
                }
                if(\Request::exists('is_nopolling')){
                    $data['nopolling_last_updated'] = now();
                }
                if(\Request::exists('is_mockpoll_done')){
                    $data['mockpoll_last_updated'] = now();
                }
                if(\Request::exists('voter_in_queue')){
                    $data['voter_in_queue_last_updated'] = now();
                }
                if(\Request::exists('polling_party_left')){
                    $data['polling_party_left_last_updated'] = now();
                }
                if(\Request::exists('evm_deposited')){
                    $data['evm_deposited_last_updated'] = now();
                }
                if(\Request::exists('is_booth_capt')){
                    $data['booth_capt_last_updated'] = now();
                }
                if(\Request::exists('is_law_prob')){
                    $data['law_prob_last_updated'] = now();
                }
                if(\Request::exists('is_evm_prob')){
                    $data['evm_prob_last_updated'] = now();
                }
                if(\Request::exists('is_mockpoll_clear')){
                    $data['mockpollclear_last_updated'] = now();
                }
                if(\Request::exists('is_battery_removed')){
                    $data['battery_removed_last_updated'] = now();
                }

                if(\Request::exists('is_evm_switch_off')){
                    $data['is_evm_switch_off_last_updated'] = now();
                }
                
                $data = ElectionInfo::create($data);

                $electionInfo =ElectionInfo::with(['electionState','electionDistrict','electionBooth','electionAssembly'])->find($data->id);

             
                $success['events']=$electionInfo;
                $success['events']['state_name']=$electionInfo->electionState->name;
                $success['events']['district_name']=$electionInfo->electionDistrict->name;
                $success['events']['assemble_name']=$electionInfo->electionAssembly->asmb_name;
                $success['events']['booth_name']=$electionInfo->electionBooth->booth_name;
                $success['events']['ac_type']=$electionInfo->electionAssembly->ac_type;
                $success['events']['pc_type']=$electionInfo->electionAssembly->pc_type;
                $success['events']['st_code']=$electionInfo->electionAssembly->st_code;
                $success['events']['asmb_code']=$electionInfo->electionAssembly->asmb_code;

                unset($success['events']['id']);
                unset($success['events']['deleted_at']);
                
                unset($success['events']['electionAssembly']);
                unset($success['events']['electionBooth']);
                unset($success['events']['electionDistrict']);
                unset($success['events']['electionState']);
                
                return $this->sendResponse($success, 'Event updated successfully.');
            }
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
          } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error'=>$e->getMessage()]);
          }
    }

}
