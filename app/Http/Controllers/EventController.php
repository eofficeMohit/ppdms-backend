<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Validator;

class EventController extends Controller
{
    public function index(Request $request) :View
    {
        $data = Event::latest()->paginate(20);
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
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'event_name' => 'required|unique:events,event_name',
            'event_sequence' => 'required|numeric|unique:events,event_sequence',
            'start_date_time' => 'required',
            'end_date_time' => 'required|after:event_start_date',
            'status' => 'required|in:0,1'
        ]);
        $input = $request->all();
        $Events = Event::create($input);
        return redirect()->route('events')
                        ->with('success','Events created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $event = Event::where('id', $id)->first();
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $event = Event::find($id);
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'event_name' => 'required|unique:events,event_name,' . $id,
            'event_sequence' => 'required|numeric|unique:events,event_sequence,' . $id,
            'event_start_date' => 'required',
            'event_end_date' => 'required|after:event_start_date',
            'status' => 'required|in:0,1'
        ]);
        $input = $request->all();
        $event = Event::find($id);
        $event->update($input);
        return redirect()->route('events')
                        ->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Event::find($id)->delete();
        return redirect()->route('events')
                        ->with('success','Eevnt deleted successfully');
    }
}