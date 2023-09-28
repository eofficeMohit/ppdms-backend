<?php
namespace App\Http\Controllers;
use App\Models\Assembly;
use App\Models\Parliament;
use App\Models\State;
use App\Models\District;
use App\Models\Booth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;


class AssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('assemblies.index');
    }
    public function getAssemblyTableData(){
        $assembly = Assembly::with(['state','parliament'])->orderBy('created_at', 'desc');
        return Datatables::eloquent($assembly)
             ->addIndexColumn()
             ->addColumn('st_code', function($row){
                return $row->state->st_code;
                })
            ->addColumn('pc_type', function($row){
                return $row->parliament->pc_type;
                })
            ->addColumn('pc_no', function($row){
                return $row->parliament->pc_no;
                })
             ->make();
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $parliament = Parliament::pluck('pc_name','id')->all();
        return view('assemblies.create',compact('states','districts','parliament'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            //'st_code' => 'required',
            'asmb_code' => 'required|numeric',
            'ac_type' => 'required',
            //'pc_type' => 'required',
            'pc_id' => 'required|numeric',
            'district_id' => 'required',
            'state_id' => 'required',
            'asmb_name' => 'required',
            'ac_name_uni' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        //dd($input);
        $assembly = Assembly::create($input);
        return redirect()->route('assemblies')
                        ->with('success','Assembly created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $assembly = Assembly::where('id', $id)->with('state','district')->first();
        return view('assemblies.show',compact('assembly'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $assembly = Assembly::find($id);
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $parliament = Parliament::pluck('pc_name','id')->all();
        return view('assemblies.edit',compact('assembly','states','districts','parliament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            //'st_code' => 'required',
            'asmb_code' => 'required|numeric',
            'ac_type' => 'required',
            //'pc_type' => 'required',
            'pc_id' => 'required|numeric',
            'district_id' => 'required',
            'state_id' => 'required',
            'asmb_name' => 'required',
            'ac_name_uni' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        $assembly = Assembly::find($id);
        $assembly->update($input);
        return redirect()->route('assemblies')
                        ->with('success','Assembly updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Assembly::find($id)->delete();
        return redirect()->route('assemblies')
                        ->with('success','Assembly deleted successfully');
    }

    public function getStates(Request $request)
    {
        $selectedOption = $request->input('selectedOption'); // This should match the parameter name in the AJAX request
        $data = District::where('state_id', $selectedOption)->get();
        return response()->json($data);
    }

    public function getAssemblies(Request $request)
    {
        $selectedOption = $request->input('selectedOption'); // This should match the parameter name in the AJAX request
        $data = Assembly::where('district_id', $selectedOption)->get();
        return response()->json($data);
    }
    public function getBooths(Request $request)
    {
        $selected_assemble = $request->input('selected_assemble'); // This should match the parameter name in the AJAX request
        $selected_user = $request->input('selected_user');
        $where = array('assemble_id'=> $selected_assemble,'user_id'=> $selected_user);
        $data = Booth::where($where)->get();
        return response()->json($data);
    }
    public function updateStatus(Request $request)
    {
        $assembly = Assembly::find($request->id);
        $assembly->status = $request->status;
        $assembly->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
}
