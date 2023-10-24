<?php

namespace App\Http\Controllers;

use App\Models\PollInterrupted;
use App\Models\District;
use App\Models\State;
use App\Models\Assembly;
use App\Models\Booth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
        
class PollInterruptedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('poll_interrupted.index');
    }

    public function getPollInterrupted(){
        $pollDetails = PollInterrupted::with('interruptedType','electionDistrict','electionBooth','electionAssembly')->orderBy('created_at', 'desc');
        return Datatables::eloquent($pollDetails)
             ->addIndexColumn()
             ->addColumn('interruptedType', function($row){
                return $row->interruptedType->name;
                })
            ->addColumn('booth', function($row){
                return $row->electionBooth->booth_name;
                })
            ->addColumn('assembly', function($row){
                return $row->electionAssembly->asmb_name;
                })  
            ->addColumn('district', function($row){
                return $row->electionDistrict->name;
                })  
             ->make();
     }

    /**
     * Display the specified resource.
     */
    public function show(PollInterrupted $pollInterrupted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pollInterrupted = PollInterrupted::find($id);
        $district_id = $pollInterrupted->district_id;
        $state_id = $pollInterrupted->state_id;
        $assembly_id = $pollInterrupted->assemble_id;
        $user_id = $pollInterrupted->user_id;
        $booth_id = $pollInterrupted->booth_id;
        $states = State::pluck('name','id')->all();
        $districts = District::where('state_id',$state_id)->pluck('name','id');
        $assembly = Assembly::where('district_id',$district_id)->pluck('asmb_name','id');
        $users = User::where('assemble_id',$assembly_id)->pluck('name','id');
        $booth = Booth::where('assemble_id',$assembly_id)->where('user_id',$user_id)->pluck('booth_name','id');
        return view('poll_interrupted.edit',compact('pollInterrupted','districts','states','assembly','users','booth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        if($input['interrupted_type'] == 2){
            $this->validate($request, [
                'stop_time' => 'required',
                'interrupted_type' => 'required',
                'resume_time' => 'required',
                'remarks' => 'required',
                'old_cu' => 'required',
                'old_bu' => 'required',
                'new_cu' => 'required',
                'new_bu' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'interrupted_type' => 'required',
                'stop_time' => 'required',
                'resume_time' => 'required',
                'remarks' => 'required',
            ]);
            $input['old_cu']="";
            $input['old_bu']="";
            $input['new_cu']="";
            $input['new_bu']="";
        }
        
        
        $PolledDetail = PollInterrupted::find($id);
        $PolledDetail->update($input);
        return redirect()->route('poll-interrupted')
                        ->with('success','Poll Interrupted updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        PollInterrupted::find($id)->delete();
        return redirect()->route('poll-interrupted')
                        ->with('success','Poll Interrupted deleted successfully');
    }
}
