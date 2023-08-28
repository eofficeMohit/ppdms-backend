<?php

namespace App\Http\Controllers;

use App\Models\ElectionInfo;
use App\Models\State;
use App\Models\District;
use App\Models\Booth;
use App\Models\Assembly;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class ElectionInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = ElectionInfo::with('state','district','booth')->latest()->paginate(20);
        return view('election_info.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
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
        return view('election_info.create',compact('states','districts','booth','assembly'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        //echo "<pre>";
        //print_r($input);
        //die('here');
        $Events = ElectionInfo::create($input);
        return redirect()->route('election-info')
                        ->with('success','Events created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionInfo $electionInfo)
    {
        //
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
        return view('election_info.edit',compact('election_info','states','districts','booth','assembly'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionInfo $electionInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionInfo $electionInfo)
    {
        //
    }
}
