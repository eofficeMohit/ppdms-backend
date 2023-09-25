<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parliament;
use Illuminate\View\View;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use DataTables;

class ParliamentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        return view('parliament.index');
    }

    public function getParliamentData(){
        $parliament = Parliament::with('state')->get();
        return Datatables::of($parliament)
             ->addIndexColumn()
             ->addColumn('state', function($row){
                return $row->state->name;
                })
             ->make();
     }

    public function create()
    {
        $states = State::pluck('name','id')->all();
        return view('parliament.create',compact('states'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pc_no' => 'required|numeric|unique:parliaments,pc_no',
            'pc_name' => 'required|unique:parliaments,pc_name',
            'pc_type' => 'required',
            'state_id' => 'required',
        ]);
        $input = $request->all();
        $booth = Parliament::create($input);
        return redirect()->route('parliaments.index')
                        ->with('success','Parliament created successfully');
    }

    public function show($id): View
    {
        $parliament = Parliament::where('id', $id)->with('state')->first();
        return view('parliament.show',compact('parliament'));
    }

    public function edit($id): View
    {
        $parliament = Parliament::find($id);
        $states = State::pluck('name','id')->all();
        return view('parliament.edit',compact('parliament','states'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'pc_no' => 'required|numeric|unique:parliaments,pc_no,'.$id,
            'pc_name' => 'required|unique:parliaments,pc_name,'.$id,
            'pc_type' => 'required',
            'state_id' => 'required',
        ]);
        $input = $request->all();
        $parliament = Parliament::find($id);
        $parliament->update($input);
        return redirect()->route('parliaments.index')
                        ->with('success','Parliament updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Parliament::find($id)->delete();
        return redirect()->route('parliaments.index')
                        ->with('success','Parliament deleted successfully');
    }

    public function updateStatus(Request $request)
    {
        $parliament = Parliament::find($request->id);
        $parliament->status = $request->status;
        $parliament->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
}
