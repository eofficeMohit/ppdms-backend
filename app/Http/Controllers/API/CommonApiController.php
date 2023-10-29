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
use App\Models\PollInterrupted;
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
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                $user = User::with(['userAssemblies', 'userState', 'userDistrict'])->find($token->tokenable_id);
                $assemblyBooths = Booth::where('assigned_to', $token->tokenable_id)
                    ->pluck('booth_no')
                    ->implode(','); //where('user_id', $token->tokenable_id)->
                $success['user_image'] = asset('assets/img/next-gen.png') ?? asset('public/assets/img/next-gen.png');
                $success['user_name'] = rtrim($user->name, ' ') ?? '';
                $success['state'] = $user->userState->name ?? '';
                $success['district'] = $user->userDistrict->name ?? '';
                $success['assemblies'] = $user->userAssemblies->asmb_name ?? '';
                $success['assembly_booths'] = $assemblyBooths;
                return $this->sendResponse($success, 'User profile-details.');
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
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
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                /* Validate event Data */
                $validator = Validator::make($request->all(), [
                    'event_id' => 'required|numeric|exists:events,id',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $user = User::find($token->tokenable_id);
                $userBooths = Booth::where('user_id', $user->id)->get();
                $success = [];
                foreach ($userBooths as $userBooth) {
                    $electionInfo = ElectionInfo::with(['electionState', 'electionDistrict', 'electionBooth', 'electionAssembly'])
                        ->where('booth_id', $userBooth->id)
                        ->where('assemble_id', $userBooth->assemble_id)
                        ->where('state_id', $userBooth->state_id)
                        ->where('district_id', $userBooth->district_id)
                        ->where('event_id', $request->event_id)
                        ->latest()
                        ->first();

                    if (!empty($electionInfo)) {
                        $event_id = $electionInfo->event_id;
                        $event_status = $electionInfo->status;
                    } else {
                        $event_id = '';
                        $event_status = '';
                    }
                    $success[] = [
                        'id' => $userBooth->id,
                        'booth_no' => $userBooth->booth_no,
                        'booth_name' => $userBooth->booth_name,
                        'assemble_id' => $userBooth->assemble_id,
                        'state_id' => $userBooth->state_id,
                        'district_id' => $userBooth->district_id,
                        'event_id' => $event_id ?? '',
                        'event_status' => $event_status ?? '',
                    ];
                }

                return $this->sendResponse($success, 'User all booths.');
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
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
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                $events = Event::orderby('event_sequence')->get();
                $success = [];

                if (count($events) == 0) {
                    return $this->sendResponse($success, 'No, event found.');
                }
                $booth_count = Booth::where('user_id', \Auth::id())->count();

                foreach ($events as $event) {
                    $updatedEvents = ElectionInfo::where('event_id', $event->id)
                        ->where('user_id', \Auth::id())
                        ->where('status', 1)
                        ->count();

                    $notUpdatedEventCount = $booth_count - $updatedEvents;

                    $success[] = [
                        'event_id' => $event->id,
                        'event_name' => $event->event_name,
                        'event_sequence' => $event->event_sequence,
                        'status' => $event->status,
                        'start_date_time' => $event->start_date_time,
                        'end_date_time' => $event->end_date_time,
                        'updated_events' => $updatedEvents,
                        'not_updated_events' => $notUpdatedEventCount,
                    ];
                }
                return $this->sendResponse($success, 'All Events.');
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
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
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                /* Validate event Data */
                $validator = Validator::make($request->all(), [
                    'state_id' => 'required|numeric|exists:states,id',
                    'district_id' => 'required|numeric|exists:districts,id',
                    'booth_id' => 'required|numeric|exists:booths,id',
                    'assemble_id' => 'required|numeric|exists:assemblies,id',
                    'event_id' => 'required|numeric|exists:events,id',
                    'status' => 'required|numeric|in:0,1',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }
                $check_user_booth = Booth::where('user_id', \Auth::id())
                    ->where('id', $request->booth_id)
                    ->exists();
                $success = [];
                if ($check_user_booth === true) {
                    $data = $request->all();
                    //next event check
                    $next_event_id = $request->event_id + 1;
                    $check_next_event = ElectionInfo::where('event_id', $next_event_id)
                        ->where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->where('status', 1)
                        ->exists();
                    if ($check_next_event === true) {
                        $get_next_event = ElectionInfo::with('electionEvent')
                            ->where('event_id', $next_event_id)
                            ->where('user_id', \Auth::id())
                            ->where('status', 1)
                            ->first();
                        $message = $get_next_event->electionEvent->event_name . ' status already updated(yes)!';
                        return $this->sendError('Warning!', $message);
                    }

                    //previous event check
                    if ($request->event_id > '1') {
                        $previous_event_id = $request->event_id - 1;
                        $check_previous_event = ElectionInfo::where('event_id', $previous_event_id)
                            ->where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->where('status', 1)
                            ->exists();
                        if ($check_previous_event === false) {
                            $get_previous_event = Event::where('id', $previous_event_id)
                                ->where('status', 1)
                                ->first();
                            $message = $get_previous_event->event_name . ' status not updated(no)!';
                            return $this->sendError('Warning!', $message);
                        }
                    }

                    if ($request->has('event_id') && $request->event_id == '4') {
                        $validator = Validator::make($request->all(), [
                            'mock_poll_status' => 'required|numeric|in:0,1',
                            'evm_cleared_status' => 'required|numeric|in:0,1',
                            'vvpat_cleared_status' => 'required|numeric|in:0,1',
                        ]);

                        if ($validator->fails()) {
                            return $this->sendError('Validation Error.', $validator->errors());
                        }

                        if ($request->mock_poll_status == '1' && $request->evm_cleared_status == '1' && $request->vvpat_cleared_status == '1') {
                            $data['status'] = 1;
                        } else {
                            $data['status'] = 0;
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

                    if ($request->has('event_id') && $request->event_id == '6') {
                        $selected_slot = '';
                        $get_event_timeSlots = EventTimeslot::where('event_id', '6')
                            ->where('status', '1')
                            ->get();

                        // timeslot occurence
                        foreach ($get_event_timeSlots as $key => $timeSlot) {
                            $dt = new DateTime();
                            $current_time = $dt->format('H:i:s');

                            if ($timeSlot->start_time <= $current_time && $current_time <= $timeSlot->end_time) {
                                $selected_slot = $timeSlot->end_time;
                                // echo 'Event occur in '.($timeSlot->end_time).' slot.</br>';
                            }
                        }
                        $user_booth = Booth::with('assembly')
                            ->where('user_id', \Auth::id())
                            ->where('id', $request->booth_id)
                            ->first();
                        $poll_details = PolledDetail::with(['polledAssembly', 'polledBooth'])
                            ->where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->where('assemble_id', $request->assemble_id)
                            ->latest()
                            ->first();
                        $last_vote_polled = $poll_details->vote_polled ?? 0;

                        if (!empty($selected_slot)) {
                            $date_time_received = '';
                            if (!empty($poll_details->date_time_received)) {
                                $date_time_received = date('H:i', strtotime($poll_details->date_time_received));
                            }

                            $success['events']['assembly_name'] = $user_booth->assembly->asmb_name ?? '';
                            $success['events']['booth_name'] = $user_booth->booth_name;
                            $success['events']['total_voters'] = $user_booth->tot_voters ?? '';
                            $success['events']['last_vote_polled'] = $last_vote_polled ?? '';
                            $success['events']['last_vote_polled_time'] = $date_time_received ?? '';
                            $success['events']['votes_polled_till'] = $selected_slot ?? 'Slot not available';

                            return $this->sendResponse($success, 'Event occurs in ' . $selected_slot . ' time slot.');
                        } else {
                            return $this->sendResponse((object) $success, 'No,slot available.');
                        }
                    }

                    if ($request->has('event_id') && $request->event_id == '7') {
                        $user_booth = Booth::with('assembly')
                            ->where('user_id', \Auth::id())
                            ->where('id', $request->booth_id)
                            ->first();
                        $poll_details = PolledDetail::with(['polledAssembly', 'polledBooth'])
                            ->where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->where('assemble_id', $request->assemble_id)
                            ->latest()
                            ->first();
                        $total_vote_polled = PolledDetail::where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->where('assemble_id', $request->assemble_id)
                            ->sum('vote_polled');
                        $date_time_received = '';
                        if (!empty($poll_details)) {
                            $date_time_received = \Carbon\Carbon::parse($poll_details->date_time_received);
                            $date_time_received = $date_time_received->format('h:i a');
                        } else {
                            $date_time_received = \Carbon\Carbon::now()->format('h:i a');
                        }
                        $success['events']['assembly_name'] = $user_booth->assembly->asmb_name ?? '';
                        $success['events']['booth_name'] = $user_booth->booth_name;
                        $success['events']['total_voters'] = $user_booth->tot_voters ?? '';
                        $success['events']['votes_polled'] = $total_vote_polled ?? '';
                        $success['events']['remaining_votes'] = $poll_details ? $poll_details->polledBooth->tot_voters - $total_vote_polled : '';
                        $success['events']['last_updated'] = $date_time_received ? $date_time_received : '';

                        return $this->sendResponse($success, 'Event details for voter queue.');
                    }

                    $data['user_id'] = \Auth::id();
                    $check_event_exists = ElectionInfo::where('event_id', $request->event_id)
                        ->where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->exists();

                    if ($check_event_exists === true) {
                        ElectionInfo::where('event_id', $request->event_id)
                            ->where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->update(['status' => $request->status]);
                        $get_id = ElectionInfo::where('event_id', $request->event_id)
                            ->where('user_id', \Auth::id())
                            ->where('booth_id', $request->booth_id)
                            ->where('status', $request->status)
                            ->pluck('id')
                            ->first();
                    } else {
                        $data = ElectionInfo::create($data);
                        $get_id = $data->id;
                    }
                    $electionInfo = ElectionInfo::with(['electionState', 'electionDistrict', 'electionBooth', 'electionAssembly', 'electionEvent'])->find($get_id);

                    $success['events']['state_name'] = $electionInfo->electionState->name ?? '';
                    $success['events']['district_name'] = $electionInfo->electionDistrict->name ?? '';
                    $success['events']['assemble_name'] = $electionInfo->electionAssembly->asmb_name ?? '';
                    $success['events']['booth_name'] = $electionInfo->electionBooth->booth_name ?? '';
                    $success['events']['event_name'] = $electionInfo->electionEvent->event_name ?? '';
                    $success['events']['event_status'] = $electionInfo->status ?? '';
                    $success['events']['ac_type'] = $electionInfo->electionAssembly->ac_type ?? '';
                    $success['events']['st_code'] = $electionInfo->electionState->st_code ?? '';
                    $success['events']['asmb_code'] = $electionInfo->electionAssembly->asmb_code ?? '';

                    return $this->sendResponse($success, 'Event updated successfully.');
                }
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
        }
    }

    public function updateTurnoutAndQueue(Request $request): JsonResponse
    {
        try {
            if ($request->bearerToken()) {
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
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $data = $request->all();
                $data['user_id'] = \Auth::id();
                $success[] = [];

                $user_booth = Booth::where('user_id', \Auth::id())
                    ->where('id', $request->booth_id)
                    ->first();
                $get_total_votes = $user_booth->tot_voters;
                if ($request->voting > $get_total_votes) {
                    return $this->sendError('Message.', 'Vote polled cannot exceed total votes.');
                }

                //voter turnout conditions
                if ($request->has('event_id') && $request->event_id == '6') {
                    $data['date_time_received'] = now();
                    $data['ip_address'] = trim(shell_exec('dig +short myip.opendns.com @resolver1.opendns.com'));
                    $data['ip_host'] = request()->ip();

                    $poll_details = PolledDetail::where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->where('assemble_id', $request->assemble_id)
                        ->latest()
                        ->first();
                    $date_time_received = '';
                    if (!empty($poll_details->date_time_received)) {
                        $date_time_received = date('H:i', strtotime($poll_details->date_time_received));
                    }
                    if (Carbon::now()->format('H:i:s') > '18:00:00') {
                        $data['voting'] = $poll_details->vote_polled ?? '';
                        $data['voting_last_updated'] = $poll_details->date_time_received ?? '';
                        $data['status'] = 1;
                        $data = ElectionInfo::create($data);
                        $success = $data;
                    } else {
                        $poll_detail_time = date('H:i', strtotime($date_time_received));
                        $dt = new DateTime();
                        $current_time = $dt->format('H:i:s');
                        $get_events_timeslot = EventTimeslot::where('event_id', $request->event_id)
                            ->whereTime('start_time', '<=', $current_time)
                            ->whereTime('locking_time', '>=', $current_time)
                            ->where('status', 1)
                            ->first();

                        if (!empty($get_events_timeslot)) {
                            $current_slot_end_time = date('H:i', strtotime($get_events_timeslot->end_time));
                            $current_slot_start_time = date('H:i', strtotime($get_events_timeslot->start_time));
                            $current_slot_locking_time = date('H:i', strtotime($get_events_timeslot->locking_time));

                            if ($current_slot_end_time <= Carbon::now()->format('H:i') && Carbon::now()->format('H:i') <= $current_slot_locking_time) {
                                if ($poll_detail_time >= $current_slot_end_time && $poll_detail_time <= $current_slot_locking_time) {
                                    $data = [
                                        'current_slot_start_time' => $current_slot_start_time,
                                        'current_slot_end_time' => $current_slot_end_time,
                                        'current_slot_locking_time' => $current_slot_locking_time,
                                    ];
                                    return $this->sendResponse($data, 'Details already updated in this slot successfully.');
                                } else {
                                    $data['vote_polled'] = $request->voting;
                                    $data = PolledDetail::create($data);
                                    $success = $data;
                                }
                            } else {
                                return $this->sendError('Message.', 'Current time does not occur in the given locking time.');
                            }
                        } else {
                            return $this->sendError('Message.', 'No, Timeslot Avaliable.');
                        }
                    }

                    return $this->sendResponse($success, 'Detail updated successfully.');
                }

                if ($request->has('event_id') && $request->event_id == '7') {
                    //check booths
                    $user_booth = Booth::where('user_id', \Auth::id())
                        ->where('id', $request->booth_id)
                        ->first();
                    $get_total_votes = $user_booth->tot_voters;
                    $get_voter_turnout_votes_polled = ElectionInfo::where('event_id', 6)
                        ->where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->where('status', 1)
                        ->whereDate('created_at', '=', Carbon::today()->toDateString())
                        ->first();
                    $vote_polled = 0;
                    if (!empty($get_voter_turnout_votes_polled)) {
                        $vote_polled = $get_voter_turnout_votes_polled->voting;
                    }
                    $vote_remaining = $get_total_votes - $vote_polled;

                    if ($request->voting > $vote_remaining) {
                        return $this->sendError('Message.', 'Voters in queue cannot exceed voter remaining.');
                    }

                    //check voter in queqe
                    $check_voter_in_queqe = ElectionInfo::where('event_id', $request->event_id)
                        ->where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->where('status', 1)
                        ->whereDate('created_at', '=', Carbon::today()->toDateString())
                        ->exists();

                    if ($check_voter_in_queqe === false) {
                        if (Carbon::now()->format('H:i:s') > '18:00:00') {
                            $data['voting_last_updated'] = now();
                            $data['status'] = 1;
                            $data = ElectionInfo::create($data);
                            $success = $data;
                            return $this->sendResponse($success, 'Voter in Queue has been updated successfully.');
                        } else {
                            return $this->sendError('Message.', 'Voter Turnout is not completed yet.');
                        }
                    } else {
                        return $this->sendError('Message.', 'Voter in Queue already updated.');
                    }
                }
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
        }
    }

    public function pollInterrupted(Request $request): JsonResponse
    {
        try {
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                /* Validate Poll Interrupted Data */
                $validator = Validator::make($request->all(), [
                    'event_id' => 'required|in:13',
                    'state_id' => 'required|numeric|exists:states,id',
                    'district_id' => 'required|numeric|exists:districts,id',
                    'booth_id' => 'required|numeric|exists:booths,id',
                    'assemble_id' => 'required|numeric|exists:assemblies,id',
                    'interrupted_type' => 'required|numeric|in:1,2',
                    'stop_time' => 'required',
                    'remarks' => 'required',
                    'resume_time' => 'nullable',
                    'old_cu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                    'old_bu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                    'new_cu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                    'new_bu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $data = $request->all();
                $data['user_id'] = \Auth::id();
                $data['status'] = 1;
                $success[] = [];

                $check_event_exists = PollInterrupted::where('event_id', $request->event_id)
                    ->where('interrupted_type', $request->interrupted_type)
                    ->where('user_id', \Auth::id())
                    ->where('booth_id', $request->booth_id)
                    ->exists();

                if ($check_event_exists === true) {
                    PollInterrupted::where('event_id', $request->event_id)
                        ->where('interrupted_type', $request->interrupted_type)
                        ->where('user_id', \Auth::id())
                        ->where('booth_id', $request->booth_id)
                        ->update(['status' => $data['status'], 'resume_time' => $request->resume_time]);
                    return $this->sendResponse('Message', 'Poll Interrupted Updated Successfully.');
                } else {
                    $insert_data = PollInterrupted::create($data);
                    $success = $insert_data;
                    return $this->sendResponse($success, 'Poll Interrupted added successfully.');
                }
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
        }
    }

    public function getPollInterrupted(Request $request): JsonResponse
    {
        try {
            if ($request->bearerToken()) {
                $hashedTooken = $request->bearerToken();
                $token = PersonalAccessToken::findToken($hashedTooken);

                /* Validate Poll Interrupted Data */
                $validator = Validator::make($request->all(), [
                    'booth_id' => 'required|numeric|exists:booths,id',
                    'interrupted_type' => 'required|numeric|in:1,2',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                $success[] = [];
                $get_poll_interruptions = PollInterrupted::where('interrupted_type', $request->interrupted_type)
                    ->where('user_id', \Auth::id())
                    ->where('booth_id', $request->booth_id)
                    ->first();

                if (!empty($get_poll_interruptions)) {
                    $success = $get_poll_interruptions;
                    return $this->sendResponse($success, 'Poll Interrupted details.');
                } else {
                    return $this->sendError('Error.', 'No, Records available for this booth.');
                }
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } catch (\Exception $e) {
            return $this->sendError('Exception.', ['error' => $e->getMessage()]);
        }
    }
}
