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
use DataTables;

class BoothController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('booth.index');
    }
    public function getBoothTableData(){
        $booth = Booth::with('assembly');
        return Datatables::eloquent($booth)->orderColumn('booths.id', 'desc')
            ->addIndexColumn()
            ->addColumn('asmb_name', function($row){
                return $row->assembly->asmb_name;
                })
             ->make(true);
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

    public function map_booth(Request $request) :View
    {
        $assembly = Assembly::orderBy('id')->get();
        $users = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'SO');
        })->get();
        return view('map_booth.create',compact('assembly','users'));
    }
    public function getSoUsers(Request $request)
    {
        $selectedOption = $request->input('selectedOption');
        $users = User::where('assemble_id',$selectedOption)->whereHas('roles', function ($query) {
            return $query->where('name', '=', 'SO');
        })->get();
        $response = array('so_users' => $users);
        return response()->json($response);
    }

    public function getMapBooths(Request $request)
    {
        $selectedOfficer = $request->input('selectedOfficer');
        $selectedAssem = $request->input('selectedAssem');
        $unass_booths = Booth::where('assemble_id',$selectedAssem)->where('assigned_status',0)->orderBy('id')->get();
        $ass_booths = Booth::where('assemble_id',$selectedAssem)->where('assigned_to',$selectedOfficer)->where('assigned_status',1)->orderBy('id')->get();
        $response = array('unass_booths' => $unass_booths, 'ass_booths' => $ass_booths);
        return response()->json($response);
    }

    public function mapOffBooths(Request $request)
    {
        try{

       
        $input = $request->all();
        $assemble_id =  $input['params']['selectedAssem'];
        $booth_id = $input['params']['booth_id'];
        $user_id = auth()->user()->id;
        $assigned_to = $input['params']['selectedOff'];
          
        $check_user=  User::find($assigned_to);
          if(empty($check_user->assemble_id) || empty($check_user->district_id) || empty($check_user->state_id)){
            $get_booths= Booth::find($booth_id);
             User::where('id', $assigned_to)
             ->update([
                'assemble_id' => $get_booths->assemble_id,
                'district_id' => $get_booths->district_id,
                'state_id' => $get_booths->state_id,
            ]);

        }
        $assigned_by = $user_id;
        $assigned_status = $input['params']['status'];
        Booth::where('id', $booth_id)
            ->update([
                'user_id' => $assigned_to,
                'assigned_to' => $assigned_to,
                'assigned_by' => $assigned_by,
                'assigned_status' => $assigned_status,
            ]);
        }catch(\Exception $e){
              echo  'Message: ' .$e->getMessage();
        }
    }

    public function updateStatus(Request $request)
    {
        $booth = Booth::find($request->id);
        $booth->status = $request->status;
        $booth->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
}
