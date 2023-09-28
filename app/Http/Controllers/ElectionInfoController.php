<?php

namespace App\Http\Controllers;

use App\Models\ElectionInfo;
use App\Models\State;
use App\Models\District;
use App\Models\Booth;
use App\Models\Assembly;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;

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
}
