<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;

class StateController extends Controller
{
    public function index(Request $request) :View
    {
        return view('state.index');
    }

    public function getStateData(){
        $assembly = State::get();
        return Datatables::of($assembly)
             ->addIndexColumn()
             ->make();
     }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('state.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name',
            'st_code' => 'required|unique:states,st_code',
            'status' => 'required'
        ]);
        $input = $request->all();
        $state = State::create($input);
        return redirect()->route('states.index')
                        ->with('success','State created successfully');
    }

    public function show($id): View
    {
        $state = State::where('id', $id)->first();
        return view('state.show',compact('state'));
    }

    public function edit($id): View
    {
        $state = State::find($id);
        return view('state.edit',compact('state'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name,'.$id,
            'st_code' => 'required|unique:states,st_code,'.$id,
            'status' => 'required',
        ]);
        $input = $request->all();
        $state = State::find($id);
        $state->update($input);
        return redirect()->route('states.index')
                        ->with('success','State updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        State::find($id)->delete();
        return redirect()->route('states.index')
                        ->with('success','State deleted successfully');
    }

    public function updateStatus(Request $request)
    {

        $state = State::find($request->id);

        $state->status = $request->status;

        $state->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
