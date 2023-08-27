<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assembly;
use App\Models\ElectionInfo;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        $assemblies = Assembly::with('state','district')->latest()->paginate(20);
        $total_party_dispatch = ElectionInfo::where('is_party_dispatch',1)->count();
        $total_party_reached = ElectionInfo::where('is_party_reached',1)->count();
        $total_mock_poll_started = ElectionInfo::where('is_mockpoll_done',1)->count();
        return view('dashboard.index',compact('assemblies','total_party_dispatch','total_party_reached','total_mock_poll_started'))->with('i', ($request->input('page', 1) - 1) * 20);
    }
    public function indexStat()
    {
        return view('dashboard.indexStat');
    }
}
