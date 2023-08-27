<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StateController extends Controller
{
    public function index(Request $request) :View
    {
        $data = State::latest()->paginate(20);
        return view('state.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }

    public function updateStatus(Request $request)
    {

        $state = State::find($request->id);

        $state->status = $request->status;

        $state->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
