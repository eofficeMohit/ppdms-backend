<?php

namespace App\Http\Controllers;

use App\Models\PolledDetail;
use App\Models\District;
use App\Models\State;
use App\Models\Assembly;
use App\Models\Booth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
     
class PolledDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('poll_details.index');
    }

    public function getPollDetails(){
        $pollDetails = PolledDetail::with('polledDistrict','polledBooth','polledAssembly')->orderBy('created_at', 'desc');
        return Datatables::eloquent($pollDetails)
             ->addIndexColumn()
             ->addColumn('district', function($row){
                return $row->polledDistrict->name;
                })
            ->addColumn('booth', function($row){
                return $row->polledBooth->booth_name;
                })
            ->addColumn('assembly', function($row){
                return $row->polledAssembly->asmb_name;
                })    
             ->make();
     }

    /**
     * Display the specified resource.
     */
    public function show(PolledDetail $polledDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pollDetail = PolledDetail::find($id);
        $district_id = $pollDetail->district_id;
        $state_id = $pollDetail->state_id;
        $assembly_id = $pollDetail->assemble_id;
        $user_id = $pollDetail->user_id;
        $booth_id = $pollDetail->booth_id;
        $states = State::pluck('name','id')->all();
        $districts = District::where('state_id',$state_id)->pluck('name','id');
        $assembly = Assembly::where('district_id',$district_id)->pluck('asmb_name','id');
        $users = User::where('assemble_id',$assembly_id)->pluck('name','id');
        $booth = Booth::where('assemble_id',$assembly_id)->where('user_id',$user_id)->pluck('booth_name','id');
        return view('poll_details.edit',compact('pollDetail','districts','states','assembly','users','booth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'vote_polled' => 'required|numeric',
            'date_time_recieved' => 'required',
        ]);
        $input = $request->all();
        $input['date_time_received'] = date('Y-m-d H:i:s', strtotime($input['date_time_recieved']));
        $PolledDetail = PolledDetail::find($id);
        $PolledDetail->update($input);
        return redirect()->route('poll-details')
                        ->with('success','Poll Details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        PolledDetail::find($id)->delete();
        return redirect()->route('poll-details')
                        ->with('success','Poll Detail deleted successfully');
    }
}
