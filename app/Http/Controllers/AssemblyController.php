<?php
namespace App\Http\Controllers;
use App\Models\Assembly;
use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class AssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = Assembly::latest()->paginate(3);
        return view('assemblies.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        return view('assemblies.create',compact('states','districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'st_code' => 'required',
            'asmb_code' => 'required',
            'ac_type' => 'required',
            'pc_type' => 'required',
            'pc_no' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'asmb_name' => 'required',
            'ac_name_uni' => 'required',
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
        $assembly = Assembly::find($id);
        //$district_id = $assembly->pluck('district_id');
        return view('assemblies.show',compact('assembly'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assembly $assembly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assembly $assembly)
    {
        //
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
}
