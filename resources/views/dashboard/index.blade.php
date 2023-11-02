<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-toast></x-toast>
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <style>
            .table_cls {
                border-collapse: collapse;
                width: 100%;
            }

            .sub-table {
                display: none;
                display: table-row;
            }
        </style>
        <div class="container-fluid py-4">
            <div class="row card_event">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Dispatched</strong></p>
                                <h4 class="mb-0" id="party_dispatch">{{ $total_party_dispatch ?? 0 }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                                lask month</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Reached</strong></p>
                                <h4 class="mb-0" id="party_reached">{{ $total_party_reached }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                                yesterday</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Setup Polling Station</strong></p>
                                <h4 class="mb-0" id="setup_poll_sat">{{ $total_setup_poll }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                                yesterday</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Mock-Poll Started</strong></p>
                                <h4 class="mb-0" id="mock_poll_start">{{ $total_mock_poll_started }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Started</strong></p>
                                <h4 class="mb-0" id="poll_started">{{ $total_poll_started }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Voter Turnout</strong></p>
                                <h4 class="mb-0" id="voter_turnout">{{ $total_voter_turnout }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Voter In Queue</strong></p>
                                <h4 class="mb-0" id="voter_in_queue">{{ $total_Voter_in_queue }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Ended</strong></p>
                                <h4 class="mb-0" id="total_poll_ended">{{ $total_poll_ended }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong> EVM Switched Off</strong></p>
                                <h4 class="mb-0"  id="machine_closed">{{ $total_machine_closed_EVM_switched }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Departed</strong></p>
                                <h4 class="mb-0" id="party_departed">{{ $total_Party_departed }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Reached</strong></p>
                                <h4 class="mb-0" id="total_party_reached">{{ $total_party_reached_at_centre }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>EVM Deposited</strong></p>
                                <h4 class="mb-0" id="evm_deposited">{{ $total_EVM_deposited }}</h4>
                            </div>
                            {{-- <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div> --}}
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div> --}}
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Party Dispatched</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Total Votes </h6>
                            <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today
                                sales. </p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> updated 4 min ago </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Completed Votes</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm">just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-warning shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="bar-chart-tasks" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Remaining Votes</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm">just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row mb-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Election Info Listings</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">Latest</span> 20 Election Informations
                                    </p>
                                </div>
                                <div class="col-lg-6 col-5 my-auto text-end">
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md"
                                                    href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md"
                                                    href="javascript:;">Something
                                                    else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Event</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Booth</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Assembly</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Districts</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                State</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$electionInfo->isEmpty())
                                            @foreach ($electionInfo as $key => $election)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $election->electionEvent->event_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $election->electionBooth->booth_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $election->electionAssembly->asmb_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $election->electionDistrict->name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <p class="mb-0 text-sm">
                                                                    {{ $election->electionState->name }}</p>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        @if ($election->status == 1)
                                                            <span
                                                                class=" text-xs font-weight-bold badge bg-success">True</span>
                                                        @else
                                                            <span
                                                                class=" text-xs font-weight-bold badge bg-warning">False</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex text-center">
                                                        <div>
                                                            <p class="mb-0 text-sm">No Record's Found.</p>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Orders overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-success text-gradient">notifications</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes
                                        </h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-danger text-gradient">code</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-info text-gradient">shopping_cart</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for
                                            April</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-warning text-gradient">credit_card</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                            #4395133</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-primary text-gradient">key</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                            development</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="material-icons text-dark text-gradient">payments</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h4>ELection Live details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-4">
                            <div class="table-responsive p-0">
                                <div class="px-0 pb-4 mt-4">
                                    <button id="print-table">Print Table</button>
                                    <button id="download-csv">Download CSV</button>
                                    <button id="download-json">Download JSON</button>
                                    <button id="download-xlsx">Download XLSX</button>
                                    <button id="download-pdf">Download PDF</button>
                                    <button id="download-html">Download HTML</button>
                                </div>
                                <div>
                                </div>
                                <div id="example-table"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Poll Interrupted</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                S.NO</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Assembly</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Booth Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Booth No.</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stop Time</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Resume Time </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Reason </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Last Updated </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$pollInterrupted->isEmpty())
                                            @foreach ($pollInterrupted as $key => $poll)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{ $poll->id }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $poll->electionAssembly->asmb_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $poll->electionBooth->booth_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $poll->electionBooth->booth_no }}</p>

                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ date('h:i a', strtotime($poll->stop_time)) }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ date('h:i a', strtotime($poll->resume_time)) }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">{{ $poll->remarks }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">{{ $poll->updated_at }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex text-center">
                                                        <div>
                                                            <p class="mb-0 text-sm">No Record's Found.</p>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    @php
        $jsonArray = json_encode($district_array);
        $newArray = json_encode($new_array);
    @endphp
    @php
        $jsonArray = json_encode($district_array);
    @endphp
    <x-footers.auth></x-footers.auth>
    <x-plugins></x-plugins>
    </div>
    </div>
    @push('js')
        <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
        <script src="{{ asset('assets/js/piety.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.2.0/he.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
        <script>
            var districts = "{{ $jsonArray }}";
            var decodedData = he.decode(districts);
            var jsonData = JSON.parse(decodedData);

            var graphData = "{{ $newArray }}";
            var graphDecodedData = he.decode(graphData);
            var graphJsonData = JSON.parse(graphDecodedData);
            console.log('graphJsonData', graphJsonData);
            var districts = "{{ $jsonArray }}";
            var decodedData = he.decode(districts);
            var jsonData = JSON.parse(decodedData);
            console.log(jsonData);
            //custom max min header filter
            var minMaxFilterEditor = function(cell, onRendered, success, cancel, editorParams) {

                var end;

                var container = document.createElement("span");

                //create and style inputs
                var start = document.createElement("input");
                start.setAttribute("type", "number");
                start.setAttribute("placeholder", "Min");
                start.setAttribute("min", 0);
                start.setAttribute("max", 100);
                start.style.padding = "4px";
                start.style.width = "50%";
                start.style.boxSizing = "border-box";

                start.value = cell.getValue();

                function buildValues() {
                    success({
                        start: start.value,
                        end: end.value,
                    });
                }

                function keypress(e) {
                    if (e.keyCode == 13) {
                        buildValues();
                    }

                    if (e.keyCode == 27) {
                        cancel();
                    }
                }

                end = start.cloneNode();
                end.setAttribute("placeholder", "Max");

                start.addEventListener("change", buildValues);
                start.addEventListener("blur", buildValues);
                start.addEventListener("keydown", keypress);

                end.addEventListener("change", buildValues);
                end.addEventListener("blur", buildValues);
                end.addEventListener("keydown", keypress);


                container.appendChild(start);
                container.appendChild(end);

                return container;
            }

            //custom max min filter function
            function minMaxFilterFunction(headerValue, rowValue, rowData, filterParams) {
                //headerValue - the value of the header filter element
                //rowValue - the value of the column in this row
                //rowData - the data for the row being filtered
                //filterParams - params object passed to the headerFilterFuncParams property

                if (rowValue) {
                    if (headerValue.start != "") {
                        if (headerValue.end != "") {
                            return rowValue >= headerValue.start && rowValue <= headerValue.end;
                        } else {
                            return rowValue >= headerValue.start;
                        }
                    } else {
                        if (headerValue.end != "") {
                            return rowValue <= headerValue.end;
                        }
                    }
                }

                return true; //must return a boolean, true if it passes the filter.
            }


            //Formatter to generate charts
            var chartFormatter = function(cell, formatterParams, onRendered) {
                var content = document.createElement("span");
                var values = cell.getValue();

                //invert values if needed
                if (formatterParams.invert) {
                    values = values.map(val => val * -1);
                }

                //add values to chart and style
                content.classList.add(formatterParams.type);
                content.innerHTML = values.join(",");

                //setup chart options
                var options = {
                    width: 145,
                }

                if (formatterParams.fill) {
                    options.fill = formatterParams.fill
                }

                //instantiate piety chart after the cell element has been aded to the DOM
                onRendered(function() {
                    peity(content, formatterParams.type, options);
                });

                return content;
            };
            var tableDataNested = jsonData;
            /*var tableDataNested = [{
                                    name: "Oli Bob",
                                    location: "United Kingdom",
                                    rating: 20,
                                    line: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                                    bar: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                                    colored: [1, 20, -5, -3, 10, 13, 0, 15, 9, 11],
                                    inverted: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                                    _children: [
                                        {
                                            name: "Brendon Philips",
                                            location: "USA",
                                            rating: 91,
                                            line: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                                            bar: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                                            colored: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                                            inverted: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                                            _children: [{
                                                    name: "Margret Marmajuke",
                                                    location: "Canada",
                                                    rating: 99,
                                                    line: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                                    bar: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                                    colored: [1, -3, 1, 3, -3, 1, -1, 3, 1, 3],
                                                    inverted: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                                },
                                            ]
                                        },
                                    ]
                					
                                },
                                {
                                    name: "Jamie Newhart",
                                    location: "India",
                                    rating: 80,
                                    line: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                                    bar: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                                    colored: [11, 7, 6, -12, 1 - 13, 11, 10, 9, 6],
                                    inverted: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                                },
                            ];
                			*/


            var table = new Tabulator("#example-table", {
                // height: "311px",
                layout: "fitColumns",
                resizableColumnFit: true,
                data: tableDataNested,
                dataTreeChildColumnCalcs: true,
                dataTree: true,
                dataTreeStartExpanded: function(row, level) {
                    return row.getData().driver; //expand rows where the "driver" data field is true;
                },
                dataTreeSelectPropagate: true,
                printAsHtml: true,
                printHeader: "<h1>Election Report<h1>",
                printFooter: "<h2>ELECTION REPORT<h2>",
                dataTreeChildIndent: 15, //indent child rows by 15 px
                // dataTreeBranchElement: "<img class='branch-icon' src='/branch.png'/>", //show image for branch element
                columns: [{
                        title: "ID",
                        field: "id",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, //never hide this column
                    {
                        title: "Name",
                        field: "name",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, //never hide this column
                    {
                        title: "D Code",
                        field: "d_code",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Party Dispatch",
                        field: "party_dispatch",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Party Reached",
                        field: "party_reached",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Setup Polling Station",
                        field: "setup_polling_station",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Mock Poll Done",
                        field: "mock_poll_done",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Poll Started",
                        field: "poll_started",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Voter Turnout",
                        field: "voter_turnout",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Voter_In_Queue",
                        field: "voter_in_queue",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Poll Ended",
                        field: "poll_ended",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "EVM Switched 0ff",
                        field: "EVM_switched_0ff",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Party Departed",
                        field: "party_departed",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "Party Reached",
                        field: "party_reached",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, {
                        title: "EVM Deposited",
                        field: "EVM_deposited",
                        //width: 200,
                        headerFilter: "input",
                        resizable: true
                    },
                ],
                // table.recalc();
            });

            table.on("dataTreeRowExpanded", function(row, level) {
                var rowData = row.getData();
                console.log(level);
                var id = rowData.id;
                var name = rowData.name;
                var d_code = rowData.d_code;
                var party_dispatch = rowData.party_dispatch;
                var party_reached = rowData.party_reached;
                var setup_polling_station = rowData.setup_polling_station;
                var mock_poll_done = rowData.mock_poll_done;
                var poll_started = rowData.poll_started;
                var voter_turnout = rowData.voter_turnout;
                var voter_in_queue = rowData.voter_in_queue;
                var poll_ended = rowData.poll_ended;
                var EVM_switched_0ff = rowData.EVM_switched_0ff;
                var party_departed = rowData.party_departed;
                var party_reached = rowData.party_reached;
                var EVM_deposited = rowData.EVM_deposited;
                console.log('rowData', rowData);
                if (level == 0) {
                    axios.get('/new-dashboard/getAssemblies', {
                            params: {
                                id: id
                            }
                        })
                        .then(function(response) {
                            var resp = response.data;
                            var childData = resp.data;
                            if (childData.length > 0) {
                                var decodedData = he.decode(childData);
                                var jsonData = JSON.parse(decodedData);
                                console.log('data', resp.data);
                                row.update({
                                    id: id,
                                    name: name,
                                    d_code: d_code,
                                    party_dispatch: party_dispatch,
                                    _children: jsonData
                                });
                            }
                        })
                        .catch(function(error) {
                            console.error(error);
                        });
                } else {
                    axios.get('/new-dashboard/getBooths', {
                            params: {
                                id: id
                            }
                        })
                        .then(function(response) {
                            var resp = response.data;
                            var childData = resp.data;
                            if (childData.length > 0) {
                                var decodedData = he.decode(childData);
                                var jsonData = JSON.parse(decodedData);
                                console.log('data', resp.data);
                                row.update({
                                    id: id,
                                    name: name,
                                    d_code: d_code,
                                    _children: jsonData
                                });
                            }
                        })
                        .catch(function(error) {
                            console.error(error);
                        });

                }
            });
            //trigger download of data.csv file
            document.getElementById("download-csv").addEventListener("click", function() {
                table.download("csv", "data.csv");
            });

            //trigger download of data.json file
            document.getElementById("download-json").addEventListener("click", function() {
                table.download("json", "data.json");
            });

            //trigger download of data.xlsx file
            document.getElementById("download-xlsx").addEventListener("click", function() {
                table.download("xlsx", "data.xlsx", {
                    sheetName: "My Data"
                });
            });

            //trigger download of data.pdf file
            document.getElementById("download-pdf").addEventListener("click", function() {
                table.download("pdf", "data.pdf", {
                    orientation: "portrait", //set page orientation to portrait
                    title: "Example Report", //add title to report
                });
            });

            //trigger download of data.html file
            document.getElementById("download-html").addEventListener("click", function() {
                table.download("html", "data.html", {
                    style: true
                });
            });

            // var ctx = document.getElementById("chart-bars").getContext("2d");

            // new Chart(ctx, {
            //     type: "bar",
            //     data: {
            //         labels: ["Party Dispatch", "Party Reached", "Setup Booth", "Mock Poll", "Poll Started",
            //             "Poll Ended", "EVM Switch Off", "Party Departed from PS", "Party Reached at CC",
            //             "EVM Deposited"
            //         ],
            //         datasets: [{
            //             label: "EVENTS",
            //             tension: 0.4,
            //             borderWidth: 0,
            //             borderRadius: 4,
            //             borderSkipped: false,
            //             backgroundColor: "rgba(255, 255, 255, .8)",
            //             data: [50, 20, 10, 22, 50, 10, 40],
            //             maxBarThickness: 6
            //         }, ],
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //         interaction: {
            //             intersect: false,
            //             mode: 'index',
            //         },
            //         scales: {
            //             y: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: true,
            //                     drawOnChartArea: true,
            //                     drawTicks: false,
            //                     borderDash: [5, 5],
            //                     color: 'rgba(255, 255, 255, .2)'
            //                 },
            //                 ticks: {
            //                     suggestedMin: 0,
            //                     suggestedMax: 500,
            //                     beginAtZero: true,
            //                     padding: 10,
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                     color: "#fff"
            //                 },
            //             },
            //             x: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: true,
            //                     drawOnChartArea: true,
            //                     drawTicks: false,
            //                     borderDash: [5, 5],
            //                     color: 'rgba(255, 255, 255, .2)'
            //                 },
            //                 ticks: {
            //                     display: true,
            //                     color: '#f8f9fa',
            //                     padding: 10,
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //         },
            //     },
            // });
			
			function getEventsCount(){
				
				$.ajax({
					url: "/dashboard/getBoothsCount",
					type : 'GET',
					dataType:'json',
					success : function(response) {   
						var resp = response.data;
						jQuery("#party_dispatch").html(resp.total_party_dispatch);
						jQuery("#party_reached").html(resp.total_party_reached);
						jQuery("#setup_poll_sat").html(resp.total_setup_poll);
						jQuery("#mock_poll_start").html(resp.total_mock_poll_started);
						jQuery("#poll_started").html(resp.total_poll_started);
						jQuery("#voter_turnout").html(resp.total_voter_turnout);
						jQuery("#voter_in_queue").html(resp.total_Voter_in_queue);
						jQuery("#total_poll_ended").html(resp.total_poll_ended);
						jQuery("#machine_closed").html(resp.total_machine_closed_EVM_switched);
						jQuery("#party_departed").html(resp.total_Party_departed);
						jQuery("#total_party_reached").html(resp.total_party_reached_at_centre);
						jQuery("#evm_deposited").html(resp.total_EVM_deposited);
						setTimeout(getEventsCount,2000);
					},
					error : function(request,error)
					{
						alert("Request: "+JSON.stringify(request));
					}
				});
			}
			setTimeout(getEventsCount,2000); 
        </script>
    @endpush
</x-layout>
