<?php

namespace App\Http\Controllers;

use App\Models\DashboardSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Validator;
use Illuminate\Http\Response;
use DataTables;

class DashboardSettingsController extends Controller
{
    public function index(Request $request) :View
    {
        return view('dashboard_settings.index');
    }
    public function getDBSettingsData(){
        $data = DashboardSettings::get();
        return Datatables::of($data)
             ->addIndexColumn()
             ->make();
    }

    public function create(): View
    {
        return view('dashboard_settings.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'setting_title' => 'required|unique:dashboard_settings,name',
            'label.*' => 'required',
            'value.*' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200); // 400 being the HTTP code for an invalid request.
        }
        $label = $request['label'];
        $value = $request['value'];
        $name = $request['setting_title'];
        $data=array_combine($label,$value);
        $encodedData = json_encode($data);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $dashboardsettings = DashboardSettings::create([
            'name' => $name,
            'slug' => $slug,
            'data' => $encodedData,    
        ]); 
        
        return response()->json([
            'success' => true,
            'errors' => ""
        ], 200);
    }

    public function show($id): View
    {
        $dash_setting = DashboardSettings::where('id', $id)->first();
        return view('dashboard_settings.show',compact('dash_setting'));
    }
     
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $dash_setting = DashboardSettings::find($id);
        return view('dashboard_settings.edit',compact('dash_setting'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'setting_title' => 'required|unique:dashboard_settings,name,'.$id,
            'label.*' => 'required',
            'value.*' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200); // 400 being the HTTP code for an invalid request.
        }
        $label = $request['label'];
        $value = $request['value'];
        $name = $request['setting_title'];
        $data=array_combine($label,$value);
        $encodedData = json_encode($data);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $dash_setting = DashboardSettings::find($id);
        $dash_setting->update([
            'name' => $name,
            'slug' => $slug,
            'data' => $encodedData    
        ]);
    
        return response()->json([
            'success' => true,
            'errors' => ""
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        DashboardSettings::find($id)->delete();
        return redirect()->route('dashboard-settings')
                        ->with('success','Setting deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $dash_setting = DashboardSettings::find($request->id);
        $dash_setting->status = $request->status;
        $dash_setting->save();
        return response()->json(['success'=>'Status changed successfully.']);

    }
}
