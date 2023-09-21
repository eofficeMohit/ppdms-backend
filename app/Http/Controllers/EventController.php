<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTimeslot;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Validator;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function index(Request $request) :View
    {
        $data = Event::with('timeSlots')->latest()->paginate(20);
        return view('events.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|unique:events,event_name',
            'event_sequence' => 'required|numeric|unique:events,event_sequence',
            'start_date.*' => 'required',
            'start_time.*' => 'required|date_format:H:i|unique:event_timeslots,start_time',
            'end_time.*' => 'required|date_format:H:i|unique:event_timeslots,end_time|after:start_time.*',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200); // 400 being the HTTP code for an invalid request.
        }
        $events = Event::create([
            'event_name' => $request['event_name'],
            'event_sequence' => $request['event_sequence'],
            'status' => $request['status'],
        ]);

        if($events) {
            $start_time = $request['start_time'];
            $end_time = $request['end_time'];
            foreach($request['start_date'] as $key => $val){
                $start_date = $val;
                $start_time_key = $start_time[$key];
                $end_time_key = $end_time[$key];
                $eventsSlots = EventTimeslot::create([
                    'event_id' => $events->id,
                    'date' => $start_date,
                    'start_time' => $start_time_key,
                    'end_time' => $end_time_key,
                    'status' => $request['status']
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'errors' => ""
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $event = Event::where('id', $id)->first();
        $eventslots = EventTimeslot::where('event_id', $id)->get();
        return view('events.show',compact('event','eventslots'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $event = Event::find($id);
        $eventslots = EventTimeslot::where('event_id', $id)->get();
        return view('events.edit',compact('event','eventslots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|unique:events,event_name,'.$id,
            'event_sequence' => 'required|numeric|unique:events,event_sequence,'.$id,
            'start_date.*' => 'required',
            'start_time.*' => 'required',
            'end_time.*' => 'required|after:start_time.*',
            'status' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200); // 400 being the HTTP code for an invalid request.
        }
        $input = $request->all();
        $event = Event::find($id);
        $event->update([
            'event_name' => $input['event_name'],
            'event_sequence' => $input['event_sequence'],
            'status' => $input['status'],
        ]);
        EventTimeslot::where('event_id', $id)->delete();
        if($id) {
            $start_time = $request['start_time'];
            $end_time = $request['end_time'];
            foreach($request['start_date'] as $key => $val){
                $start_date = $val;
                $start_time_key = $start_time[$key];
                $end_time_key = $end_time[$key];
                $eventsSlots = EventTimeslot::create([
                    'event_id' => $id,
                    'date' => $start_date,
                    'start_time' => $start_time_key,
                    'end_time' => $end_time_key,
                    'status' => $request['status']
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'errors' => ""
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Event::find($id)->delete();
        return redirect()->route('events')
                        ->with('success','Event deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $event = Event::find($request->id);
        $event->status = $request->status;
        $event->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
}
