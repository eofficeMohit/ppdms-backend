<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\ElectionInfo;
use App\Models\PollInterrupted;
use App\Models\Assembly;
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

    public function newDashboard(Request $request)
    {
        $electionInfo = ElectionInfo::with('electionState','electionDistrict','electionBooth','electionAssembly','electionEvent')->where('event_id',1)->orderBy('id','ASC')->get();
        $total_party_dispatch = ElectionInfo::where('event_id',1)->count();
        $total_party_reached = ElectionInfo::where('event_id',2)->count();
        $total_mock_poll_started = ElectionInfo::where('event_id',3)->count();
        $poll_started = ElectionInfo::where('event_id',5)->count();
        $assemblies = Assembly::where('pc_id',4)->get();
        $new_array = array();
        $tot_booth_votes = 0;
        $polled_booth_votes = 0;
        foreach($assemblies as $key => $value){
            $tot_booth_votes += Booth::where('assemble_id', $value->id)->sum('tot_voters');
            $polled_booth_votes += ElectionInfo::where('assemble_id', $value->id)->where('event_id',6)->where('status',1)->sum('voting');
            $new_array[$value->name] = ElectionInfo::where('assemble_id', $value->id)->where('event_id',1)->where('status',1)->count();
        }
        $pollInterrupted = PollInterrupted::with('electionDistrict','electionBooth','electionAssembly','userId','interruptedType')->orderBy('id','ASC')->get();
        return view('dashboard.newDashboard',compact('tot_booth_votes','polled_booth_votes','new_array','electionInfo','total_party_dispatch','total_party_reached','total_mock_poll_started','pollInterrupted','poll_started'));

    }
}
