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
                                <h4 class="mb-0">{{ $total_party_dispatch ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Arrrived</strong></p>
                                <h4 class="mb-0">{{ $total_party_reached ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Setup of Polling Station</strong></p>
                                <h4 class="mb-0">{{ $total_setup_of_polling_station ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Mock Poll Done</strong></p>
                                <h4 class="mb-0">{{ $total_mock_poll_done ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row card_event mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Started</strong></p>
                                <h4 class="mb-0">{{ $total_poll_started ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Voter Turnout</strong></p>
                                <h4 class="mb-0">{{ $total_voter_turnout ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Voter in Queue at 6 PM</strong></p>
                                <h4 class="mb-0">{{ $total_voter_in_queue ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Ended</strong></p>
                                <h4 class="mb-0">{{ $total_poll_ended ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row card_event mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>EVM Switched Off</strong></p>
                                <h4 class="mb-0">{{ $total_machine_closed ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Departed from PS</strong></p>
                                <h4 class="mb-0">{{ $total_party_departed ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Reached at CC</strong></p>
                                <h4 class="mb-0">{{ $total_party_reached_at_collection_centre ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>EVM Deposited</strong></p>
                                <h4 class="mb-0">{{ $total_evm_deposited ?? 0 }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">{{ $total_booths }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card_event mt-4">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Votes</strong></p>
                                <h4 class="mb-0">{{ $tot_booth_votes ?? 0 }}</h4>
                            </div>
                            <div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Votes Polled</strong></p>
                                <h4 class="mb-0">{{ $polled_booth_votes ?? 0 }}</h4>
                            </div>
                            <div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Votes Polled(%)</strong></p>
                                <h4 class="mb-0">
                                    {{ number_format(($polled_booth_votes / $tot_booth_votes) * 100, 6) }}%
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
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
                                                            {{ date('h:i', strtotime($poll->stop_time)) }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ date('h:i', strtotime($poll->resume_time)) }}
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
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Party Dispatch</h6>
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
                                                Booth No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Booth Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Party Dispatch</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Last Updated</th>
                                            </thead>
                                    <tbody>
                                        @if (!$electionInfo->isEmpty())
                                            @foreach ($electionInfo as $key => $election)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $election->electionBooth->booth_no }}</p>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                {{ $election->electionBooth->booth_name }}</p>

                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        @if ($election->status == 1)
                                                            <span
                                                                class=" text-xs font-weight-bold badge bg-success">Yes</span>
                                                        @else
                                                            <span
                                                                class=" text-xs font-weight-bold badge bg-warning">No</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{ $election->updated_at }}</p>

                                                        </div>
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

            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Tables / Sub-Tables</h6>
                        </div>
                    </div>
                </div>
				<div class="card-body px-4 pb-4">
                            <div class="table-responsive p-0">
                                <h1>Live Polling Details</h1>
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
    </main>
	@php
		$jsonArray = json_encode($district_array);
		$newArray = json_encode($new_array);
	@endphp
    <x-footers.auth></x-footers.auth>
    <x-plugins></x-plugins>
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
			console.log('graphJsonData',graphJsonData);
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
                printFooter: "<h2>PUNJAB ELECTION REPORT<h2>",
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
                    },
                ],
                // table.recalc();
            });
			
			table.on("dataTreeRowExpanded", function(row, level){
				var rowData = row.getData();
				console.log(level);
				var id = rowData.id;
				var name = rowData.name;
				var d_code = rowData.d_code;
				console.log('rowData',rowData);
				if(level == 0){
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
							console.log('data',resp.data);
							row.update({id:id, name:name, d_code:d_code,_children: jsonData});
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
							console.log('data',resp.data);
							row.update({id:id, name:name, d_code:d_code,_children: jsonData});
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
			
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Party Dispatch", "Party Reached", "Setup Booth", "Mock Poll", "Poll Started",
                        "Poll Ended", "EVM Switch Off", "Party Departed from PS", "Party Reached at CC",
                        "EVM Deposited"
                    ],
                    datasets: [{
                        label: "EVENTS",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "rgba(255, 255, 255, .8)",
                        data: [50, 20, 10, 22, 50, 10, 40],
                        maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'rgba(255, 255, 255, .2)'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 10,
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                                color: "#fff"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: 'rgba(255, 255, 255, .2)'
                            },
                            ticks: {
                                display: true,
                                color: '#f8f9fa',
                                padding: 10,
                                font: {
                                    size: 14,
                                    weight: 300,
                                    family: "Roboto",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });

        </script>
    @endpush
</x-layout>
