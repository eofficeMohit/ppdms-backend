<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;

class DistrictController extends Controller
{
    public function index(Request $request) :View
    {
        return view('district.index');
    }
    public function getDistrictTableData(){
        $district = District::with('state')->orderBy('created_at', 'desc');
        return Datatables::eloquent($district)
             ->addIndexColumn()
             ->addColumn('state', function($row){
                return $row->state->name;
                })
             ->make();
     }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::pluck('name','id')->all();
        return view('district.create',compact('states'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name',
            'd_code' => 'required|unique:districts,d_code',
            'd_name_hindi' => 'required|unique:districts,d_name_hindi',
            'state_id' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        $district = District::create($input);
        return redirect()->route('districts.index')
                        ->with('success','District created successfully');
    }

    public function show($id): View
    {
        $district = District::where('id', $id)->first();
        $states = State::pluck('name','id')->all();
        return view('district.show',compact('district','states'));
    }

    public function edit($id): View
    {
        $district = District::find($id);
        $states = State::pluck('name','id')->all();
        return view('district.edit',compact('district','states'));
    }
   
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name,'.$id,
            'd_code' => 'required|unique:districts,d_code,'.$id,
            'd_name_hindi' => 'required|unique:districts,d_name_hindi,'.$id,
            'state_id' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        $district = District::find($id);
        $district->update($input);
        return redirect()->route('districts.index')
                        ->with('success','District updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        District::find($id)->delete();
        return redirect()->route('districts.index')
                        ->with('success','District deleted successfully');
    }
    public function updateStatus(Request $request)
    {

        $district = District::find($request->id);

        $district->status = $request->status;

        $district->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
