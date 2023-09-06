<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\State;
use App\Models\District;
use App\Models\Assembly;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;  
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {   
        $data = User::whereHas('roles', function ($query) {
            return $query->where('name','!=', 'SO');
        })->latest()->paginate(20);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }


    public function soIndex(Request $request): View
    {   
        $data = User::role('SO')->latest()->paginate(20);
        return view('users.so_index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();
        $states = State::pluck('name','id')->all();
        return view('users.create',compact('roles','states'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|numeric|digits:10|unique:users,mobile_number',
            'password' => 'required|same:confirm_password',
            'state_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'assemble_id' => 'required|numeric',
            'roles' => 'required',
            'status' => 'required|numeric|in:0,1',
        ]);
        $input = $request->all();
        //$input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    /**
     * Display the specified resource.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::where('id',$id)->with('userState','userDistrict','userAssemblies')->first();
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $states = State::pluck('name','id')->all();
        $districts = District::pluck('name','id')->all();
        $assembly = Assembly::pluck('asmb_name','id')->all();
        return view('users.edit',compact('user','roles','userRole','states','districts','assembly'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|numeric|digits:10|unique:users,mobile_number,'.$id,
            'password' => 'same:confirm-password',
            'state_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'assemble_id' => 'required|numeric',
            'roles' => 'required',
            'status' => 'required|numeric|in:0,1',
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
?>