<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ErrorLog;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class IssueManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = ErrorLog::with('user')->latest()->paginate(20);
        return view('issues.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
    }
}
