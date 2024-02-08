<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ErrorLog;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
class IssueManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('issues.index');
    }
    public function getIssueManagementData(){
        $data = ErrorLog::with('user')->orderBy('created_at', 'desc');
        return Datatables::eloquent($data)
             ->addIndexColumn()
             ->addColumn('user_name', function($row){
                $username= "guest";
                if($row->user->name){
                    $username = $row->user->name;
                }
                return $username;
                })
                ->addColumn('created_at', function($row){
                    $created_at= date('Y-m-d H:i:s', strtotime($row->created_at));
                    return $created_at;
                    })
             ->make();
    }
}
