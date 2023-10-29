<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\ElectionInfo;
use App\Models\PollInterrupted;
use App\Models\Assembly;
use App\Models\District;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $electionInfo = ElectionInfo::with('electionState', 'electionDistrict', 'electionBooth', 'electionAssembly', 'electionEvent')
            ->latest()
            ->paginate(20);
        $districtCount = District::count();
        $total_party_dispatch = ElectionInfo::where('event_id', 1)
            ->where('status', 1)
            ->count();
        $total_party_reached = ElectionInfo::where('event_id', 2)
            ->where('status', 1)
            ->count();
        $total_setup_poll = ElectionInfo::where('event_id', 3)
            ->where('status', 1)
            ->count();
        $total_mock_poll_started = ElectionInfo::where('event_id', 4)
            ->where('status', 1)
            ->count();
        $total_poll_started = ElectionInfo::where('event_id', 5)
            ->where('status', 1)
            ->count();
        $total_voter_turnout = ElectionInfo::where('event_id', 6)
            ->where('status', 1)
            ->count();
        $total_Voter_in_queue = ElectionInfo::where('event_id', 7)
            ->where('status', 1)
            ->count();
        $total_poll_ended = ElectionInfo::where('event_id', 8)
            ->where('status', 1)
            ->count();
        $total_machine_closed_EVM_switched = ElectionInfo::where('event_id', 9)
            ->where('status', 1)
            ->count();
        $total_Party_departed = ElectionInfo::where('event_id', 10)
            ->where('status', 1)
            ->count();
        $total_party_reached = ElectionInfo::where('event_id', 11)
            ->where('status', 1)
            ->count();
        $total_EVM_deposited = ElectionInfo::where('event_id', 12)
            ->where('status', 1)
            ->count();

        $districtsColumns = ['name', 'd_code', 'state', 'status'];
        $assemblyColumns = ['ASSEMBLY NAME', 'AC TYPE', 'LAST UPDATED'];
        $districtsDetails = District::with('state')
            ->where('status', 1)
            ->get();

        return view('dashboard.index', compact('electionInfo', 'total_machine_closed_EVM_switched', 'total_EVM_deposited', 'total_party_reached', 'total_Party_departed', 'total_poll_ended', 'total_Voter_in_queue', 'total_voter_turnout', 'total_setup_poll', 'total_poll_started', 'assemblyColumns', 'districtsDetails', 'districtsColumns', 'districtCount', 'total_party_dispatch', 'total_party_reached', 'total_mock_poll_started'))->with('i', ($request->input('page', 1) - 1) * 20);
    }
    public function indexStat()
    {
        $electionInfo = ElectionInfo::with('electionState', 'electionDistrict', 'electionBooth', 'electionAssembly', 'electionEvent')
            ->latest()
            ->paginate(20);
        $locations = Booth::select('latitude', 'longitude', 'booth_name', 'assigned_status')->get();
        return view('dashboard.indexStat', compact('locations', 'electionInfo'));
    }

    public function getAssemblies(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $assembly = Assembly::where('district_id', $id)
            ->orderBy('id', 'ASC')
            ->get();
        $new_array = [];
        foreach ($assembly as $kk => $vv) {
            $new_array[$kk]['id'] = $vv->id;
            $new_array[$kk]['name'] = $vv->asmb_name;
            $new_array[$kk]['d_code'] = $vv->ac_type;
            $new_array[$kk]['row_id'] = '2_' . $id;
            $new_array[$kk]['_children'] = [];
        }
        $encode_data = json_encode($new_array);
        return response()->json(
            [
                'success' => true,
                'data' => $encode_data,
            ],
            200,
        );
    }

    public function getBooths(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $booth = Booth::where('assemble_id', $id)
            ->orderBy('id', 'ASC')
            ->get();
        $booth_array = [];
        foreach ($booth as $kkk => $vvv) {
            $booth_array[$kkk]['id'] = $vvv->id;
            $booth_array[$kkk]['name'] = $vvv->booth_name;
            $booth_array[$kkk]['d_code'] = $vvv->tot_voters;
        }
        $encode_data = json_encode($booth_array);
        return response()->json(
            [
                'success' => true,
                'data' => $encode_data,
            ],
            200,
        );
    }

    public function newDashboard(Request $request)
    {
        $electionInfo = ElectionInfo::with('electionState', 'electionDistrict', 'electionBooth', 'electionAssembly', 'electionEvent')
            ->where('event_id', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $total_party_dispatch = ElectionInfo::where('event_id', 1)->count();
        $total_party_reached = ElectionInfo::where('event_id', 2)->count();
        $total_mock_poll_started = ElectionInfo::where('event_id', 3)->count();
        $poll_started = ElectionInfo::where('event_id', 5)->count();
        $assemblies = Assembly::where('pc_id', 4)->get();
        $new_array = [];
        $tot_booth_votes = 0;
        $polled_booth_votes = 0;
        foreach ($assemblies as $key => $value) {
            $tot_booth_votes += Booth::where('assemble_id', $value->id)->sum('tot_voters');
            $polled_booth_votes += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 6)
                ->where('status', 1)
                ->sum('voting');
            $new_array[$value->name] = ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 1)
                ->where('status', 1)
                ->count();
        }
        $pollInterrupted = PollInterrupted::with('electionDistrict', 'electionBooth', 'electionAssembly', 'userId', 'interruptedType')
            ->orderBy('id', 'ASC')
            ->get();
        $district = District::orderBy('created_at', 'desc')->get();
        $new_district_array = [];
        foreach ($district as $key => $value) {
            $new_district_array[$key]['id'] = $value->id;
            $new_district_array[$key]['name'] = $value->name;
            $new_district_array[$key]['d_code'] = $value->d_code;
            $new_district_array[$key]['row_id'] = '1_' . $value->id;
            $new_district_array[$key]['_children'] = [];
        }
        $district_array = $new_district_array;
        /*$new_array = array();
        $booth_array = array();
        $new_array = [];
        $booth_array = [];
        foreach ($district as $key => $value) {
            $new_array[$key]['id'] = $value->id;
            $new_array[$key]['name'] = $value->name;
            $new_array[$key]['d_code'] = $value->d_code;
            $new_array[$key]['created_at'] = $value->created_at;
            $assembly = Assembly::where('district_id', $value->id)
                ->orderBy('id', 'ASC')
                ->get();
            foreach ($assembly as $kk => $vv) {
                $new_array[$key]['assemblies'][$kk]['id'] = $vv->id;
                $new_array[$key]['assemblies'][$kk]['name'] = $vv->asmb_name;
                $new_array[$key]['assemblies'][$kk]['ac_type'] = $vv->ac_type;
                $new_array[$key]['assemblies'][$kk]['created_at'] = $vv->created_at;
                $booth = Booth::where('assemble_id', $vv->id)
                    ->orderBy('id', 'ASC')
                    ->get();
                foreach ($booth as $kkk => $vvv) {
                    $booth_array[$kkk]['id'] = $vvv->id;
                    $booth_array[$kkk]['assemble_id'] = $vvv->assemble_id;
                    $booth_array[$kkk]['name'] = $vvv->booth_name;
                    $booth_array[$kkk]['tot_voters'] = $vvv->tot_voters;
                    $booth_array[$kkk]['created_at'] = $vvv->created_at;
                }
                $new_array[$key]['assemblies'][$kk]['booths'] = $booth_array;
            }
        }*/

        return view('dashboard.newDashboard', compact('tot_booth_votes', 'polled_booth_votes', 'district_array', 'electionInfo', 'total_party_dispatch', 'total_party_reached', 'total_mock_poll_started', 'pollInterrupted', 'poll_started', 'district'));

        // return view('dashboard.newDashboard', compact('tot_booth_votes', 'polled_booth_votes', 'new_array', 'electionInfo', 'total_party_dispatch', 'total_party_reached', 'total_mock_poll_started', 'pollInterrupted', 'poll_started', 'district'));
    }
}
