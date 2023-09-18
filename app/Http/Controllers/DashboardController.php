<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\ElectionInfo;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        $electionInfo = ElectionInfo::with('electionState','electionDistrict','electionBooth','electionAssembly','electionEvent')->latest()->paginate(20);
        $total_party_dispatch = ElectionInfo::where('event_id',1)->count();
        $total_party_reached = ElectionInfo::where('event_id',2)->count();
        $total_mock_poll_started = ElectionInfo::where('event_id',3)->count();
        return view('dashboard.index',compact('electionInfo','total_party_dispatch','total_party_reached','total_mock_poll_started'))->with('i', ($request->input('page', 1) - 1) * 20);
    }
    public function indexStat()
    {
        $locations = Booth::select('latitude','longitude','booth_name','status')->get();
        return view('dashboard.indexStat',compact('locations'));
    }
}
