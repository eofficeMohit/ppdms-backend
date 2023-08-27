<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Assembly;
use App\Models\State;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class BoothController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = Booth::latest()->paginate(20);
        return view('booth.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assembly = Assembly::pluck('asmb_name','id')->all();
        $user = User::pluck('name','id')->all();
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        return view('booth.create',compact('states','districts','assembly','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'booth_no' => 'required',
            'tot_voters' => 'required|numeric',
            'booth_name' => 'required',
            'booth_name_uni' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'assemble_id' => 'required',
            'user_id' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'status' => 'required',
        ]);
        $input = $request->all();
        $booth = Booth::create($input);
        return redirect()->route('booth')
                        ->with('success','Booth created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $booth = Booth::where('id', $id)->with('state','district','assembly','user')->first();
        $assembly_id = $booth->assemble_id;
        $assembly = Assembly::where('id',$assembly_id)->pluck('asmb_name');
        return view('booth.show',compact('booth','assembly'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $booth = Booth::find($id);
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $assembly = Assembly::pluck('asmb_name','id')->all();
        $user = User::pluck('name','id')->all();
        return view('booth.edit',compact('booth','states','districts','assembly','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'booth_no' => 'required',
            'tot_voters' => 'required|numeric',
            'booth_name' => 'required',
            'booth_name_uni' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'assemble_id' => 'required',
            'user_id' => 'required',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'status' => 'required',
        ]);
        $input = $request->all();
        $booth = Booth::find($id);
        $booth->update($input);
        return redirect()->route('booth')
                        ->with('success','Booth updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Booth::find($id)->delete();
        return redirect()->route('booth')
                        ->with('success','Booth deleted successfully');
    }
}
