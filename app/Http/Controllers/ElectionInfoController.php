<?php

namespace App\Http\Controllers;

use App\Models\ElectionInfo;
use App\Models\State;
use App\Models\District;
use App\Models\Booth;
use App\Models\Assembly;
use App\Models\Event;
use App\Models\User;
use App\Models\PolledDetail;
use App\Models\PollInterrupted;
use Spatie\Permission\Models\Role;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Carbon\Carbon;
use DateTime;
use Validator;

class ElectionInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
                return view('election_info.index');
    }

    public function getElectionInfoData(){
        $data = ElectionInfo::with('electionState','electionDistrict','electionBooth','electionAssembly','electionEvent')->orderBy('created_at', 'desc');
        return Datatables::eloquent($data)
             ->addIndexColumn()
             ->addColumn('state', function($row){
                return $row->electionState->name;
                })
            ->addColumn('district', function($row){
                return $row->electionDistrict->name;
                })
            ->addColumn('event', function($row){
                return $row->electionEvent->event_name;
                })
            ->addColumn('asmb', function($row){
                return $row->electionAssembly->asmb_name;
                })
            ->addColumn('booth', function($row){
                return $row->electionBooth->booth_name;
                })
             ->make();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $booth = Booth::pluck('booth_name','id')->all();
        $assembly = Assembly::pluck('asmb_name','id')->all();
        $events = Event::pluck('event_name','id')->all();
        return view('election_info.create',compact('states','districts','booth','assembly','events'));
    }

    public function create_new(): View
    {
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $booth = Booth::pluck('booth_name','id')->all();
        $assembly = Assembly::pluck('asmb_name','id')->all();
        $events = Event::pluck('event_name','id')->all();
        $so_users=array();
        if(Role::where('name','SO')->first()){
            $so_users = User::role('SO')->pluck('name','id');
        }
        return view('election_info_new.create',compact('states','districts','booth','assembly','events','so_users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'state_id' => 'required|numeric|exists:states,id',
            'district_id' => 'required|numeric|exists:districts,id',
            'booth_id' => 'required|numeric|exists:booths,id',
            'assemble_id' => 'required|numeric|exists:assemblies,id',
            'event_id' => 'required|numeric|exists:events,id',
            'voting' => 'numeric',
            'status'=>'required|numeric|in:0,1'
        ]);
        $input = $request->all();
        $input['user_id']=\Auth::id();
        $event_id = $input['event_id'];
        if($event_id > 1){
            $check_next_event =ElectionInfo::where('event_id',$request->$event_id++)->where('status',1)->exists();
            if($check_next_event ===true){
                return redirect()->back()->withErrors(['msg' => 'Previous event is already locked you cannot procced with this event now.']);
            }
        }

        if(ElectionInfo::create($input)){
            $event_name=Event::where('id',$input['event_id'])->pluck('event_name')->first();
            $user_id = auth()->user()->id;
            $data = array();
            $data['user_id'] = $user_id;
            $data['title'] = "Event Changed.";
            $data['message'] = "$event_name is updated by ".\Auth::user()->name;
            $data['notification_type'] = "web";
            $data['notification_for'] = "Event";
            $data['notification_for_reference'] = $input['event_id'];
            $data['notification_to'] = 1;
            $Notifications = Notification::create($data);
        }
        return redirect()->route('election-info')
                        ->with('success','Events created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $election = ElectionInfo::where('id', $id)->with('electionState','electionDistrict','electionBooth','electionAssembly','electionEvent')->first();
        return view('election_info.show',compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id): View
    {
        $election_info = ElectionInfo::find($id);
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $booth = Booth::pluck('booth_name','id')->all();
        $assembly = Assembly::pluck('asmb_name','id')->all();
        $events = Event::pluck('event_name','id')->all();
        return view('election_info.edit',compact('election_info','states','districts','booth','assembly','events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'state_id' => 'required|numeric|exists:states,id',
            'district_id' => 'required|numeric|exists:districts,id',
            'booth_id' => 'required|numeric|exists:booths,id',
            'assemble_id' => 'required|numeric|exists:assemblies,id',
            'event_id' => 'required|numeric|exists:events,id',
            'voting' => 'numeric',
            'status'=>'required|numeric|in:0,1'
        ]);
        $input = $request->all();
        $event_id = $input['event_id'];
        if($event_id > 1){
            $check_next_event =ElectionInfo::where('event_id',$request->$event_id++)->where('status',1)->exists();
            if($check_next_event ===true){
                return redirect()->back()->withErrors(['msg' => 'Previous event is already locked you cannot procced with this event now.']);
            }
        }
        $ElectionInfo = ElectionInfo::find($id);
        $ElectionInfo->update($input);
        return redirect()->route('election-info')
                        ->with('success','Election info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        ElectionInfo::find($id)->delete();
        return redirect()->route('election-info')
                        ->with('success','Eelction Info deleted successfully');
    }

    public function updateStatus(Request $request)
    {
        $eelctioninfo = ElectionInfo::find($request->id);
        $eelctioninfo->status = $request->status;
        $eelctioninfo->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }

    public function updateEventToggle(Request $request){
     
        $data_res = $request->all();
        $params = $data_res['params'];
     
        $event_id = $params['event_id'];
        $user_id = $params['so_user'];
        $booth_id = $params['booth_id'];
        $status = $params['status'];
        $district_id = $params['district_id'];
        $assemble_id = $params['assemble_id'];
        $mock_poll_status = $params['mock_poll_status'];
        $evm_cleared_status = $params['evm_cleared_status'];
        $vvpat_cleared_status = $params['vvpat_cleared_status'];
        $voting = $params['voting'];
        $state_id = $params['state_id'];
        $interrupted_type = $params['interrupted_type'];
        $stop_time = $params['stop_time'];
        $remarks = $params['remarks'];
        $resume_time = $params['resume_time'];
        $old_cu = $params['old_cu'];
        $old_bu = $params['old_bu'];
        $new_cu = $params['new_cu'];   
        $new_bu = $params['new_bu'];
        $data['event_id'] = $event_id;
        $data['user_id'] = $user_id;
        $data['booth_id'] = $booth_id;
        $data['status'] = $status;
        $data['district_id'] = $district_id;
        $data['assemble_id'] = $assemble_id;
        $data['state_id'] = $state_id;
        $data['voting']=$voting;
       
       //poll intruption
         if($event_id =='13'){
                $validator = Validator::make($data_res['params'], [
                    'interrupted_type' => 'required|numeric|in:1,2',
                    'stop_time'=>'required',
                    'remarks'=>'required',
                    'resume_time'=>'nullable',
                    'old_cu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                    'old_bu' => 'sometimes|nullable|required_if:interrupted_type,2|string',
                    'new_cu'=>  'sometimes|nullable|required_if:interrupted_type,2|string',
                    'new_bu'=>  'sometimes|nullable|required_if:interrupted_type,2|string',
                ]);    

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ], 400); // 400 being the HTTP code for an invalid request.
                }
                $poll_data['event_id'] = $event_id;
                $poll_data['user_id'] = $user_id;
                $poll_data['booth_id'] = $booth_id;
                $poll_data['status'] = $status;
                $poll_data['district_id'] = $district_id;
                $poll_data['assemble_id'] = $assemble_id;
                $poll_data['state_id'] = $state_id;
                $poll_data['interrupted_type'] = $interrupted_type;
                $poll_data['stop_time'] = $stop_time;
                $poll_data['remarks'] = $remarks;
                $poll_data['resume_time'] = $resume_time;
                $poll_data['old_cu'] = $old_cu;
                $poll_data['old_bu'] = $old_bu;
                $poll_data['new_cu'] = $new_cu;
                $poll_data['new_bu'] = $new_bu;
                $check_event_exists=PollInterrupted::where('event_id',$event_id)->where('interrupted_type',$interrupted_type)->where('user_id',$user_id)->where('booth_id',$booth_id)->exists();
           
                if($check_event_exists === true){
                    PollInterrupted::where('event_id',$event_id)->where('interrupted_type',$interrupted_type)->where('user_id',$user_id)->where('booth_id',$booth_id)->update(array('status' => $status,'resume_time'=>$resume_time));
                    return response()->json(['success'=>TRUE,'message'=>'Poll Interrupted Updated Successfully.','key'=>'error_'.$event_id ]);
                }else{
             
                    $insert_data = PollInterrupted::create($poll_data);
                    return response()->json(['success'=>TRUE,'message'=>'Poll Interrupted added successfully.','key'=>'error_'.$event_id ]);
                }

        }
        if($event_id !='13'){
        //next event check
            $next_event_id=$event_id+1;
            $check_next_event =ElectionInfo::where('event_id',$next_event_id)->where('user_id',$user_id)->where('booth_id',$booth_id)->where('status', 1)->exists();
            if($check_next_event ===true){
                $get_next_event =ElectionInfo::with('electionEvent')->where('event_id',$next_event_id)->where('user_id',$booth_id)->where('status', 1)->first();
                $message=$get_next_event->electionEvent->event_name.' status already updated(yes)!';
                return response()->json(['success'=>FALSE,'message'=>$message,'key'=>'error_'.$next_event_id ]);
            }

            //previous event check
            if($event_id > '1'){
                $previous_event_id=$event_id-1;
                $check_previous_event =ElectionInfo::where('event_id',$previous_event_id)->where('user_id',$user_id)->where('booth_id',$booth_id)->where('status', 1)->exists();
                if($check_previous_event ===false){
                    $get_previous_event =Event::where('id',$previous_event_id)->where('status',1)->first();
                    $message=$get_previous_event->event_name.' status not updated(no)!';
                    return response()->json(['success'=>FALSE,'message'=>$message,'key'=>'error_'.$previous_event_id ]);
                }
            }
        }

        if($event_id && $event_id=='4'){
            $validator = Validator::make($data_res['params'], [
                'mock_poll_status' => 'required|numeric|in:0,1',
                'evm_cleared_status' => 'required|numeric|in:0,1',
                'vvpat_cleared_status'=>'required|numeric|in:0,1'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 200); // 400 being the HTTP code for an invalid request.
            }
            if($mock_poll_status=='1' && $evm_cleared_status=='1' && $vvpat_cleared_status=='1'){
                $data['status']=1;
            }elseif($mock_poll_status=='1' && $evm_cleared_status=='0' && $vvpat_cleared_status=='0'){
                $data['status']=1;
            }elseif($mock_poll_status=='1' && $evm_cleared_status=='1' && $vvpat_cleared_status=='0'){
                $data['status']=2;
            }elseif($mock_poll_status=='1' && $evm_cleared_status=='0' && $vvpat_cleared_status=='1'){
                $data['status']=3;
            }else{
                $data['status']=0;
            }
            $data['mock_poll_status'] = $mock_poll_status;
            $data['evm_cleared_status'] = $evm_cleared_status;
            $data['vvpat_cleared_status'] = $vvpat_cleared_status;

        }

        if(isset($event_id) && $event_id=='6'){
            $data['date_time_received']=now();
            if(Carbon::now()->format('h:i:s') > '06:00:00'){
                $total_vote_polled = PolledDetail::where('user_id',$user_id)->where('booth_id',$booth_id)
                                ->where('assemble_id',$assemble_id)->sum('vote_polled');
                $data['voting']=$total_vote_polled;
                $data['voting_last_updated']=now();
                $data['status']=1;
                $data = ElectionInfo::create($data);
                $success=$data;
            }else{
                $data['vote_polled']=$voting;
                $data = PolledDetail::create($data);
                $success=$data;
            }
            return response()->json(['success'=>TRUE,'message'=>'Event Updated Successfully.','key'=>'error_'.$event_id ]);
        }

        if(isset($event_id) && $event_id=='7'){
            $data['voting_last_updated']=now();
            $data['status']=1;
            $data = ElectionInfo::create($data);
            $success=$data;
            return response()->json(['success'=>TRUE,'message'=>'Event Updated Successfully.','key'=>'error_'.$event_id ]);
        }


        $check_event_exists=ElectionInfo::where('event_id',$event_id)->where('user_id',$user_id)->where('booth_id',$booth_id)->exists();
        if($check_event_exists === true){
            ElectionInfo::where('event_id',$event_id)->where('user_id',$user_id)->where('booth_id',$booth_id)->update(array('status' => $status));
        }else{
            $insert_data = ElectionInfo::create($data);
        }
        return response()->json(['success'=>TRUE,'message'=>'Electon Info Updated Successfully.','key'=>'error_'.$event_id ]);
    }

    public function getPollInterruptedDetails(Request $request)
    {
        $user_id = $request->user;
        $booth_id = $request->booth_id;
        $check_event_party_dispatched =ElectionInfo::where('event_id',1)->where('user_id',$user_id)->where('booth_id',$booth_id)->where('status', 1)->exists();
        $check_event_poll_ended =ElectionInfo::where('event_id',8)->where('user_id',$user_id)->where('booth_id',$booth_id)->where('status', 1)->exists();
        return response()->json(['success'=>TRUE,'is_party_dispatch' => $check_event_party_dispatched,'is_poll_ended' => $check_event_poll_ended]);
    }

}
