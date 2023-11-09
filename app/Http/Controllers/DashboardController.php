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
		$total_final_counts = ElectionInfo::where('event_id', 8)
            ->where('status', 1)
            ->count();
        $total_poll_ended = ElectionInfo::where('event_id', 9)
            ->where('status', 1)
            ->count();
        $total_machine_closed_EVM_switched = ElectionInfo::where('event_id', 10)
            ->where('status', 1)
            ->count();
        $total_Party_departed = ElectionInfo::where('event_id', 11)
            ->where('status', 1)
            ->count();
        $total_party_reached_at_centre = ElectionInfo::where('event_id', 12)
            ->where('status', 1)
            ->count();
        $total_EVM_deposited = ElectionInfo::where('event_id', 13)
            ->where('status', 1)
            ->count();

        $total_poll_interuption = ElectionInfo::where('event_id', 14)
            ->where('status', 1)
            ->count();
        $total_booths = Booth::select('id')->count();
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
			$polled_party_dispatch = 0;
			$polled_party_reached = 0;
			$setup_polling_station = 0;
			$mock_poll_done = 0;
			$poll_started = 0;
			$voter_turnout = 0;
			$voter_in_queue = 0;
			$poll_ended = 0;
			$EVM_switched_0ff = 0;
			$party_departed = 0;
			$party_reached = 0;
			$EVM_deposited = 0;
			$final_votes = 0;
			$poll_interrupted = 0;
            $polled_party_dispatch += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 1)
                ->where('status', 1)
                ->count();
            $polled_party_reached += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 2)
                ->where('status', 1)
                ->count();

            $setup_polling_station += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 3)
                ->where('status', 1)
                ->count();

            $mock_poll_done += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 4)
                ->where('status', 1)
                ->count();

            $poll_started += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 5)
                ->where('status', 1)
                ->count();

            $voter_turnout += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 6)
                ->where('status', 1)
                ->sum('voting');

            $voter_in_queue += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 7)
                ->where('status', 1)
                ->sum('voting');

            $final_votes += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 8)
                ->where('status', 1)
                ->count();
			$poll_ended += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 9)
                ->where('status', 1)
                ->count();

            $EVM_switched_0ff += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 10)
                ->where('status', 1)
                ->count();

            $party_departed += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 11)
                ->where('status', 1)
				->count();

            $party_reached += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 12)
                ->where('status', 1)
                ->count();

            $EVM_deposited += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 13)
                ->where('status', 1)
                ->count();
			$poll_interrupted += ElectionInfo::where('district_id', $value->id)
                ->where('event_id', 14)
                ->where('status', 1)
                ->count();

            $new_district_array[$key]['id'] = $value->id;
            $new_district_array[$key]['name'] = $value->name;
            //$new_district_array[$key]['d_code'] = $value->d_code;
            $new_district_array[$key]['party_dispatch'] = $polled_party_dispatch;
            $new_district_array[$key]['polled_party_reached'] = $polled_party_reached;
            $new_district_array[$key]['setup_polling_station'] = $setup_polling_station;
            $new_district_array[$key]['mock_poll_done'] = $mock_poll_done;
            $new_district_array[$key]['poll_started'] = $poll_started;
            $new_district_array[$key]['voter_turnout'] = $voter_turnout;
            $new_district_array[$key]['voter_in_queue'] = $voter_in_queue;
            $new_district_array[$key]['final_votes'] = $final_votes;
            $new_district_array[$key]['poll_ended'] = $poll_ended;
            $new_district_array[$key]['EVM_switched_0ff'] = $EVM_switched_0ff;
            $new_district_array[$key]['party_departed'] = $party_departed;
            $new_district_array[$key]['party_reached'] = $party_reached;
            $new_district_array[$key]['EVM_deposited'] = $EVM_deposited;
            $new_district_array[$key]['poll_interrupted'] = $poll_interrupted;
            $new_district_array[$key]['row_id'] = '1_' . $value->id;
            $new_district_array[$key]['_children'] = [];
        }
        $district_array = $new_district_array;
        $districtsColumns = ['name', 'd_code', 'state', 'status'];
        $assemblyColumns = ['ASSEMBLY NAME', 'AC TYPE', 'LAST UPDATED'];
        $districtsDetails = District::with('state')
            ->where('status', 1)
            ->get();
        $total_booths = Booth::select('id')->count();

        return view('dashboard.index', compact('new_array', 'total_booths', 'pollInterrupted', 'electionInfo', 'total_final_counts', 'total_poll_interuption', 'total_machine_closed_EVM_switched', 'district_array', 'total_EVM_deposited', 'total_party_reached', 'total_Party_departed', 'total_poll_ended', 'total_Voter_in_queue', 'total_voter_turnout', 'total_setup_poll', 'total_poll_started', 'assemblyColumns', 'districtsDetails', 'districtsColumns', 'districtCount', 'total_party_dispatch', 'total_party_reached_at_centre', 'total_mock_poll_started'))->with('i', ($request->input('page', 1) - 1) * 20);
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
        foreach ($assembly as $key => $value) {
			$polled_party_dispatch = 0;
			$polled_party_reached = 0;
			$setup_polling_station = 0;
			$mock_poll_done = 0;
			$poll_started = 0;
			$voter_turnout = 0;
			$voter_in_queue = 0;
			$poll_ended = 0;
			$EVM_switched_0ff = 0;
			$party_departed = 0;
			$party_reached = 0;
			$EVM_deposited = 0;
			$final_votes = 0;
			$poll_interrupted = 0;
            $polled_party_dispatch += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 1)
                ->where('status', 1)
                ->count();
            $polled_party_reached += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 2)
                ->where('status', 1)
                ->count();

            $setup_polling_station += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 3)
                ->where('status', 1)
                ->count();

            $mock_poll_done += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 4)
                ->where('status', 1)
                ->count();

            $poll_started += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 5)
                ->where('status', 1)
                ->count();

            $voter_turnout += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 6)
                ->where('status', 1)
                ->sum('voting');

            $voter_in_queue += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 7)
                ->where('status', 1)
                ->sum('voting');
			$final_votes += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 8)
                ->where('status', 1)
                ->count();
            $poll_ended += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 9)
                ->where('status', 1)
                ->count();

            $EVM_switched_0ff += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 10)
                ->where('status', 1)
                ->count();

            $party_departed += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 11)
                ->where('status', 1)
				->count();

            $party_reached += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 12)
                ->where('status', 1)
                ->count();

            $EVM_deposited += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 13)
                ->where('status', 1)
                ->count();
			$poll_interrupted += ElectionInfo::where('assemble_id', $value->id)
                ->where('event_id', 14)
                ->where('status', 1)
                ->count();
            $new_array[$key]['id'] = $value->id;
            $new_array[$key]['name'] = $value->asmb_name;
            //$new_array[$key]['d_code'] = $value->ac_type;
            $new_array[$key]['party_dispatch'] = $polled_party_dispatch;
            $new_array[$key]['polled_party_reached'] = $polled_party_reached;
            $new_array[$key]['setup_polling_station'] = $setup_polling_station;
            $new_array[$key]['mock_poll_done'] = $mock_poll_done;
            $new_array[$key]['poll_started'] = $poll_started;
            $new_array[$key]['voter_turnout'] = $voter_turnout;
            $new_array[$key]['voter_in_queue'] = $voter_in_queue;
			$new_array[$key]['final_votes'] = $final_votes;
            $new_array[$key]['poll_ended'] = $poll_ended;
            $new_array[$key]['EVM_switched_0ff'] = $EVM_switched_0ff;
            $new_array[$key]['party_departed'] = $party_departed;
            $new_array[$key]['party_reached'] = $party_reached;
            $new_array[$key]['EVM_deposited'] = $EVM_deposited;
            $new_array[$key]['poll_interrupted'] = $poll_interrupted;
            $new_array[$key]['row_id'] = '1_' . $value->id;
            $new_array[$key]['_children'] = [];
        }
        $assemble_array = $new_array;
        $encode_data = json_encode($assemble_array);
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
		$new_array = [];
        foreach ($booth as $key => $value) {
			$polled_party_dispatch = 0;
			$polled_party_reached = 0;
			$setup_polling_station = 0;
			$mock_poll_done = 0;
			$poll_started = 0;
			$voter_turnout = 0;
			$voter_in_queue = 0;
			$poll_ended = 0;
			$EVM_switched_0ff = 0;
			$party_departed = 0;
			$party_reached = 0;
			$EVM_deposited = 0;
			$final_votes = 0;
			$poll_interrupted = 0;
            $polled_party_dispatch += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 1)
                ->where('status', 1)
                ->count();
            $polled_party_reached += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 2)
                ->where('status', 1)
                ->count();

            $setup_polling_station += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 3)
                ->where('status', 1)
                ->count();

            $mock_poll_done += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 4)
                ->where('status', 1)
                ->count();

            $poll_started += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 5)
                ->where('status', 1)
                ->count();

            $voter_turnout += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 6)
                ->where('status', 1)
                ->sum('voting');

            $voter_in_queue += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 7)
                ->where('status', 1)
                ->sum('voting');
			$final_votes += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 8)
                ->where('status', 1)
                ->count();
            $poll_ended += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 9)
                ->where('status', 1)
                ->count();

            $EVM_switched_0ff += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 10)
                ->where('status', 1)
                ->count();

            $party_departed += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 11)
                ->where('status', 1)
				->count();

            $party_reached += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 12)
                ->where('status', 1)
                ->count();

            $EVM_deposited += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 13)
                ->where('status', 1)
                ->count();
			$poll_interrupted += ElectionInfo::where('booth_id', $value->id)
                ->where('event_id', 14)
                ->where('status', 1)
                ->count();
            $new_array[$key]['id'] = $value->id;
            $new_array[$key]['name'] = $value->booth_name;
            //$new_array[$key]['d_code'] = $value->tot_voters;
            $new_array[$key]['party_dispatch'] = $polled_party_dispatch;
            $new_array[$key]['polled_party_reached'] = $polled_party_reached;
            $new_array[$key]['setup_polling_station'] = $setup_polling_station;
            $new_array[$key]['mock_poll_done'] = $mock_poll_done;
            $new_array[$key]['poll_started'] = $poll_started;
            $new_array[$key]['voter_turnout'] = $voter_turnout;
            $new_array[$key]['voter_in_queue'] = $voter_in_queue;
			$new_array[$key]['final_votes'] = $final_votes;
            $new_array[$key]['poll_ended'] = $poll_ended;
            $new_array[$key]['EVM_switched_0ff'] = $EVM_switched_0ff;
            $new_array[$key]['party_departed'] = $party_departed;
            $new_array[$key]['party_reached'] = $party_reached;
            $new_array[$key]['EVM_deposited'] = $EVM_deposited;
            $new_array[$key]['poll_interrupted'] = $poll_interrupted;
            $new_array[$key]['row_id'] = '1_' . $value->id;
            $new_array[$key]['_children'] = [];
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

    public function newDashboard(Request $request)
    {
        $electionInfo = ElectionInfo::with('electionState', 'electionDistrict', 'electionBooth', 'electionAssembly', 'electionEvent')
            ->where('event_id', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $total_party_dispatch = ElectionInfo::where('event_id', 1)->count();
        $total_party_reached = ElectionInfo::where('event_id', 2)->count();
        $total_setup_of_polling_station = ElectionInfo::where('event_id', 3)->count();
        $total_mock_poll_done = ElectionInfo::where('event_id', 4)->count();
        $total_poll_started = ElectionInfo::where('event_id', 5)->count();
        $total_voter_turnout = ElectionInfo::where('event_id', 6)->count();
        $total_voter_in_queue = ElectionInfo::where('event_id', 7)->count();
        $total_poll_ended = ElectionInfo::where('event_id', 9)->count();
        $total_machine_closed = ElectionInfo::where('event_id', 10)->count();
        $total_party_departed = ElectionInfo::where('event_id', 11)->count();
        $total_party_reached_at_collection_centre = ElectionInfo::where('event_id', 12)->count();
        $total_evm_deposited = ElectionInfo::where('event_id', 13)->count();
        $total_poll_interuption = ElectionInfo::where('event_id', 14)->count();
        $total_booths = Booth::select('id')->count();
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
        return view('dashboard.newDashboard', compact('tot_booth_votes', 'polled_booth_votes', 'district_array', 'electionInfo', 'total_party_dispatch', 'total_party_reached', 'total_setup_of_polling_station', 'total_mock_poll_done', 'total_poll_started', 'total_voter_turnout', 'total_voter_in_queue', 'total_poll_ended', 'total_machine_closed', 'total_party_departed', 'total_party_reached_at_collection_centre', 'total_evm_deposited', 'total_booths', 'pollInterrupted', 'district', 'new_array'));
    }

    public function getBoothsCount(Request $request)
    {
        $res_arr = array();
        $total_party_dispatch = ElectionInfo::where('event_id', 1)
        ->where('status', 1)
        ->count();
        $res_arr['total_party_dispatch'] =  $total_party_dispatch;
        $total_party_reached = ElectionInfo::where('event_id', 2)
            ->where('status', 1)
            ->count();
        $res_arr['total_party_reached'] =  $total_party_reached;
        $total_setup_poll = ElectionInfo::where('event_id', 3)
            ->where('status', 1)
            ->count();
        $res_arr['total_setup_poll'] =  $total_setup_poll;
        $total_mock_poll_started = ElectionInfo::where('event_id', 4)
            ->where('status', 1)
            ->count();
        $res_arr['total_mock_poll_started'] =  $total_mock_poll_started;
        $total_poll_started = ElectionInfo::where('event_id', 5)
            ->where('status', 1)
            ->count();
        $res_arr['total_poll_started'] =  $total_poll_started;
        $total_voter_turnout = ElectionInfo::where('event_id', 6)
            ->where('status', 1)
            ->count();
        $res_arr['total_voter_turnout'] =  $total_voter_turnout;
        $total_Voter_in_queue = ElectionInfo::where('event_id', 7)
            ->where('status', 1)
            ->count();
        $res_arr['total_Voter_in_queue'] =  $total_Voter_in_queue;
        $total_poll_ended = ElectionInfo::where('event_id', 9)
            ->where('status', 1)
            ->count();
        $res_arr['total_poll_ended'] =  $total_poll_ended;
        $total_machine_closed_EVM_switched = ElectionInfo::where('event_id', 10)
            ->where('status', 1)
            ->count();
        $res_arr['total_machine_closed_EVM_switched'] =  $total_machine_closed_EVM_switched;
        $total_Party_departed = ElectionInfo::where('event_id', 11)
            ->where('status', 1)
            ->count();
        $res_arr['total_Party_departed'] =  $total_Party_departed;
        $total_party_reached_at_centre = ElectionInfo::where('event_id', 12)
            ->where('status', 1)
            ->count();
        $res_arr['total_party_reached_at_centre'] =  $total_party_reached_at_centre;
        $total_EVM_deposited = ElectionInfo::where('event_id', 13)
            ->where('status', 1)
            ->count();
        $res_arr['total_EVM_deposited'] =  $total_EVM_deposited;
        $total_poll_interuption = ElectionInfo::where('event_id', 14)
            ->where('status', 1)
            ->count();
        $res_arr['total_poll_interuption'] =  $total_poll_interuption;
        $encode_data = json_encode($res_arr);
        return response()->json(
            [
                'success' => true,
                'data' => $res_arr,
            ],
            200,
        );
    }
}
