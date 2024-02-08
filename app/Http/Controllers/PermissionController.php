<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        return view('permissions.index');
    }

    public function getPermissionsData(){
        $permissions = Permission::orderBy('created_at', 'desc');
        return Datatables::eloquent($permissions)
             ->addIndexColumn()
             ->addColumn('created_at', function($row){
                $created_at = date('Y-m-d H:i:s', strtotime( $row->created_at));
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
        // $permission = Permission::get();
        return view('permissions.create');
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
            'name' => 'required|unique:permissions,name',
        ]);
        $permission = Permission::create(['name' => $request->input('name')]);
        // $permission->syncPermissions($request->input('permission'));
        return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $permission = Permission::find($id);
        return view('permissions.show',compact('permission'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));
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
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }
}
?>
