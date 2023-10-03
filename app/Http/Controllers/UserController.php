<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\State;
use App\Models\District;
use App\Models\Assembly;
use App\Models\UserLogin;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        return view('users.index');
    }


    public function soIndex(Request $request): View
    {
        return view('users.so_index');
    }

    public function getSoUserTableData(){
        $data=array();
        if(Role::where('name','SO')->first()){
            $data = User::role('SO');
        }
        return Datatables::eloquent($data)->orderColumn('users.id', 'desc')
             ->addIndexColumn()
             ->addColumn('role', function($row){
                $roles = array();
                if(!empty($row->getRoleNames())){
                    foreach($row->getRoleNames() as $v){
                    $roles[]= $v;
                    }
                }
                return $roles;
            })
            ->addColumn('created_at', function($row){
                $created_at = date('Y-m-d',strtotime($row->created_at));
                return $created_at;
            })
             ->make();
     }
     public function getUserTableData(){
        $data = User::whereHas('roles', function ($query) {
            return $query->where('name','!=', 'SO');
        });
        return Datatables::eloquent($data)->orderColumn('users.id', 'desc')
             ->addIndexColumn()
             ->addColumn('role', function($row){
                $roles = array();
                if(!empty($row->getRoleNames())){
                    foreach($row->getRoleNames() as $v){
                    $roles[]= $v;
                    }
                }
                return $roles;
            })
            ->addColumn('created_at', function($row){
                $created_at = date('Y-m-d',strtotime($row->created_at));
                return $created_at;
            })
             ->make();
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
            'password' => 'same:confirm_password',
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
    public function loginReport(Request $request): View
    {
        return view('users.login_report');
    }

    public function getUserLoginData(){
        $data = UserLogin::with('user');
        return Datatables::eloquent($data)->orderColumn('users.id', 'desc')
             ->addIndexColumn()
             ->addColumn('last_logout', function($row){
                $logout = "N/A";
                if($row->last_logout){
                    $logout = $row->last_logout;
                }
                return $logout;
            })
            ->addColumn('name', function($row){
                return $row->user->name;
            })
            ->addColumn('last_login', function($row){
                $login = "N/A";
                if($row->last_login){
                    $login = $row->last_login;
                }
                return $login;
            })
             ->make();
     }
    public function updateStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
    public function checkPermission(Request $request, $permission)
    {
        $user = Auth::user();

        if ($user->can($permission)) {
            return response()->json(['allowed' => true,'msg'=>'granted']);
        }

        return response()->json(['allowed' => false,'msg'=>'denied']);
    }
}
?>
