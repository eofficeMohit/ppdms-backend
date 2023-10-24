<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-toast></x-toast>
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
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
                                <h4 class="mb-0">24637</h4>
                            </div>
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
                                <h4 class="mb-0">{{ $total_party_reached }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div>
                        </div>
                        {{-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                                yesterday</p>
                        </div> --}}
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Mock-Poll Started</strong></p>
                                <h4 class="mb-0">{{ $total_mock_poll_started }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Started</strong></p>
                                <h4 class="mb-0">0</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div>
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
                            {{-- <p class="text-sm ">Last Campaign Performance</p> --}}
                            {{-- <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Daily Sales </h6>
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
                            <h6 class="mb-0 ">Completed Tasks</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm">just updated</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row mb-4">
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
                                {{-- <div class="col-lg-6 col-5 my-auto text-end">
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else here</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
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
                {{-- <div class="col-lg-4 col-md-6">
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
                </div> --}}
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
        <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
        <script src="{{ asset('assets/js/piety.js') }}"></script>
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

        <script>
            // NEsted tables

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
            var tableDataNested = [{
                    name: "Oli Bob",
                    location: "United Kingdom",
                    //gender: "male",
                    //col: "red",
                    //dob: "14/04/1984",
                    rating: 20,
                    line: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    bar: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    colored: [1, 20, -5, -3, 10, 13, 0, 15, 9, 11],
                    inverted: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    _children: [{
                            name: "Mary May",
                            location: "Germany",
                            //gender: "female",
                            //col: "blue",
                            //dob: "14/05/1982",
                            rating: 5,
                            line: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            bar: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            colored: [-10, 12, 14, 16, 13, 9, 7, 0, 10, 13],
                            inverted: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                        },
                        {
                            name: "Christine Lobowski",
                            location: "France",
                            //gender: "female",
                            //col: "green",
                            //dob: "22/05/1982",
                            rating: 35,
                            line: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            bar: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            colored: [1, 2, 5, 0, 1, 16, 4, 2, 1, 3],
                            inverted: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                        },
                        {
                            name: "Brendon Philips",
                            location: "USA",
                            //gender: "male",
                            //col: "orange",
                            //dob: "01/08/1980",
                            rating: 91,
                            line: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            bar: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            colored: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            inverted: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            _children: [{
                                    name: "Margret Marmajuke",
                                    location: "Canada",
                                    //gender: "female",
                                    //col: "yellow",
                                    //dob: "31/01/1999",
                                    rating: 99,
                                    line: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    bar: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    colored: [1, -3, 1, 3, -3, 1, -1, 3, 1, 3],
                                    inverted: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                },
                                {
                                    name: "Frank Harbours",
                                    location: "Russia",
                                    //gender: "male",
                                    //col: "red",
                                    //dob: "12/05/1966",
                                    rating: 50,
                                    line: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    bar: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    colored: [20, 17, 15, 11, 16, -9, 12, 14, 20, 12],
                                    inverted: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                },
                            ]
                        },
                    ]
                },
                {
                    name: "Jamie Newhart",
                    location: "India",
                    //gender: "male",
                    //col: "green",
                    //dob: "14/05/1985",
                    rating: 80,
                    line: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                    bar: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                    colored: [11, 7, 6, -12, 1 - 13, 11, 10, 9, 6],
                    inverted: [11, 7, 6, 12, 14, 13, 11, 10, 9, 6],
                },
                {
                    name: "Gemma Jane",
                    location: "China",
                    //gender: "female",
                    //col: "red",
                    //dob: "22/05/1982",
                    rating: 45,
                    line: [4, 17, 11, 12, 0, 5, 12, 14, 18, 11],
                    bar: [4, 17, 11, 12, 0, 5, 12, 14, 18, 11],
                    colored: [4, 17, 11, -12, 0, 5, 12, -14, 18, 11],
                    inverted: [4, 17, 11, 12, 0, 5, 12, 14, 18, 11],
                    _children: [{
                        name: "Emily Sykes",
                        location: "South Korea",
                        //gender: "female",
                        //col: "maroon",
                        //dob: "11/11/1970",
                        rating: 5,
                        line: [11, 15, 19, 20, 17, 16, 16, 5, 3, 2],
                        bar: [11, 15, 19, 20, 17, 16, 16, 5, 3, 2],
                        colored: [11, 15, 19, -20, 17, 16, 16, -5, 3, 2],
                        inverted: [11, 15, 19, 20, 17, 16, 16, 5, 3, 2],


                    }, ]
                },
                {
                    name: "James Newman",
                    location: "Japan",
                    //gender: "male",
                    //col: "red",
                    //dob: "22/03/1998",
                    rating: 66,
                    line: [1, 2, 3, 4, 5, 4, 2, 5, 9, 8],
                    bar: [1, 2, 3, 4, 5, 4, 2, 5, 9, 8],
                    colored: [1, 2, 0, -4, -5, -4, 2, 5, 9, 8],
                    inverted: [1, 2, 3, 4, 5, 4, 2, 5, 9, 8],

                }, {
                    name: "Oli Bob",
                    location: "United Kingdom",
                    //gender: "male",
                    //col: "red",
                    //dob: "14/04/1984",
                    rating: 20,
                    line: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    bar: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    colored: [1, 20, -5, -3, 10, 13, 0, 15, 9, 11],
                    inverted: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    _children: [{
                            name: "Mary May",
                            location: "Germany",
                            //gender: "female",
                            //col: "blue",
                            //dob: "14/05/1982",
                            rating: 5,
                            line: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            bar: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            colored: [-10, 12, 14, 16, 13, 9, 7, 0, 10, 13],
                            inverted: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                        },
                        {
                            name: "Christine Lobowski",
                            location: "France",
                            //gender: "female",
                            //col: "green",
                            //dob: "22/05/1982",
                            rating: 35,
                            line: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            bar: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            colored: [1, 2, 5, 0, 1, 16, 4, 2, 1, 3],
                            inverted: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                        },
                        {
                            name: "Brendon Philips",
                            location: "USA",
                            //gender: "male",
                            //col: "orange",
                            //dob: "01/08/1980",
                            rating: 91,
                            line: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            bar: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            colored: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            inverted: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            _children: [{
                                    name: "Margret Marmajuke",
                                    location: "Canada",
                                    //gender: "female",
                                    //col: "yellow",
                                    //dob: "31/01/1999",
                                    rating: 99,
                                    line: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    bar: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    colored: [1, -3, 1, 3, -3, 1, -1, 3, 1, 3],
                                    inverted: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                },
                                {
                                    name: "Frank Harbours",
                                    location: "Russia",
                                    //gender: "male",
                                    //col: "red",
                                    //dob: "12/05/1966",
                                    rating: 50,
                                    line: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    bar: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    colored: [20, 17, 15, 11, 16, -9, 12, 14, 20, 12],
                                    inverted: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                },
                            ]
                        },
                    ]
                }, {
                    name: "Oli Bob",
                    location: "United Kingdom",
                    //gender: "male",
                    //col: "red",
                    //dob: "14/04/1984",
                    rating: 20,
                    line: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    bar: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    colored: [1, 20, -5, -3, 10, 13, 0, 15, 9, 11],
                    inverted: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    _children: [{
                            name: "Mary May",
                            location: "Germany",
                            //gender: "female",
                            //col: "blue",
                            //dob: "14/05/1982",
                            rating: 5,
                            line: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            bar: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            colored: [-10, 12, 14, 16, 13, 9, 7, 0, 10, 13],
                            inverted: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                        },
                        {
                            name: "Christine Lobowski",
                            location: "France",
                            //gender: "female",
                            //col: "green",
                            //dob: "22/05/1982",
                            rating: 35,
                            line: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            bar: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            colored: [1, 2, 5, 0, 1, 16, 4, 2, 1, 3],
                            inverted: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                        },
                        {
                            name: "Brendon Philips",
                            location: "USA",
                            //gender: "male",
                            //col: "orange",
                            //dob: "01/08/1980",
                            rating: 91,
                            line: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            bar: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            colored: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            inverted: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            _children: [{
                                    name: "Margret Marmajuke",
                                    location: "Canada",
                                    //gender: "female",
                                    //col: "yellow",
                                    //dob: "31/01/1999",
                                    rating: 99,
                                    line: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    bar: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    colored: [1, -3, 1, 3, -3, 1, -1, 3, 1, 3],
                                    inverted: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                },
                                {
                                    name: "Frank Harbours",
                                    location: "Russia",
                                    //gender: "male",
                                    //col: "red",
                                    //dob: "12/05/1966",
                                    rating: 50,
                                    line: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    bar: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    colored: [20, 17, 15, 11, 16, -9, 12, 14, 20, 12],
                                    inverted: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                },
                            ]
                        },
                    ]
                }, {
                    name: "Oli Bob",
                    location: "United Kingdom",
                    //gender: "male",
                    //col: "red",
                    //dob: "14/04/1984",
                    rating: 20,
                    line: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    bar: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    colored: [1, 20, -5, -3, 10, 13, 0, 15, 9, 11],
                    inverted: [1, 20, 5, 3, 10, 13, 17, 15, 9, 11],
                    _children: [{
                            name: "Mary May",
                            location: "Germany",
                            //gender: "female",
                            //col: "blue",
                            //dob: "14/05/1982",
                            rating: 5,
                            line: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            bar: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                            colored: [-10, 12, 14, 16, 13, 9, 7, 0, 10, 13],
                            inverted: [10, 12, 14, 16, 13, 9, 7, 11, 10, 13],
                        },
                        {
                            name: "Christine Lobowski",
                            location: "France",
                            //gender: "female",
                            //col: "green",
                            //dob: "22/05/1982",
                            rating: 35,
                            line: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            bar: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                            colored: [1, 2, 5, 0, 1, 16, 4, 2, 1, 3],
                            inverted: [1, 2, 5, 4, 1, 16, 4, 2, 1, 3],
                        },
                        {
                            name: "Brendon Philips",
                            location: "USA",
                            //gender: "male",
                            //col: "orange",
                            //dob: "01/08/1980",
                            rating: 91,
                            line: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            bar: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            colored: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            inverted: [3, 7, 9, 1, 4, 8, 2, 6, 4, 2],
                            _children: [{
                                    name: "Margret Marmajuke",
                                    location: "Canada",
                                    //gender: "female",
                                    //col: "yellow",
                                    //dob: "31/01/1999",
                                    rating: 99,
                                    line: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    bar: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                    colored: [1, -3, 1, 3, -3, 1, -1, 3, 1, 3],
                                    inverted: [1, 3, 1, 3, 3, 1, 1, 3, 1, 3],
                                },
                                {
                                    name: "Frank Harbours",
                                    location: "Russia",
                                    //gender: "male",
                                    //col: "red",
                                    //dob: "12/05/1966",
                                    rating: 50,
                                    line: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    bar: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                    colored: [20, 17, 15, 11, 16, -9, 12, 14, 20, 12],
                                    inverted: [20, 17, 15, 11, 16, 9, 12, 14, 20, 12],
                                },
                            ]
                        },
                    ]
                },

            ];

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
                        title: "Name",
                        field: "name",
                        width: 200,
                        headerFilter: "input",
                        resizable: true
                    }, //never hide this column
                    {
                        title: "Location",
                        field: "location",
                        headerFilter: "input",

                        resizable: true
                    },
                    // {
                    //     title: "Gender",
                    //     field: "gender",
                    // headerFilter: true,
                    //     headerFilterParams: {
                    //         values: {
                    //             "male": "Male",
                    //             "female": "Female",
                    //             "": ""
                    //         },
                    //         clearable: true
                    //     },
                    //     responsive: 2,
                    //     resizable: true
                    // }, //hide this column first
                    // {
                    //     title: "Favourite Color",
                    //     field: "col",

                    //     resizable: true
                    // },
                    // {
                    //     title: "Date Of Birth",
                    //     field: "dob",
                    //     hozAlign: "center",
                    //     bottomCalcParams: {
                    //         precision: 3
                    //     },
                    //     // formatter: "tickCross",

                    //     resizable: true
                    // },
                    {
                        title: "Rating",
                        field: "rating",
                        hozAlign: "left",
                        formatter: "progress",
                        headerFilter: "number",
                        headerFilterPlaceholder: "at least...",
                        headerFilterFunc: ">=",
                        //   bottomCalc: "avg",
                        //  topCalc: "count",
                        // resizable: true
                    }, {
                        title: "Line Chart",
                        field: "line",
                        width: 160,
                        formatter: chartFormatter,
                        formatterParams: {
                            type: "line"
                        }
                    },
                    {
                        title: "Bar Chart",
                        field: "bar",
                        width: 160,
                        formatter: chartFormatter,
                        formatterParams: {
                            type: "bar"
                        }
                    },
                    {
                        title: "Coloured Bar Chart",
                        field: "colored",
                        width: 160,
                        formatter: chartFormatter,
                        formatterParams: {
                            type: "bar",
                            fill: function(value) {
                                return value > 0 ? "green" : "red"
                            }
                        }
                    },
                    {
                        title: "Inverted Bar Chart",
                        field: "inverted",
                        width: 160,
                        formatter: chartFormatter,
                        formatterParams: {
                            type: "bar",
                            invert: true,
                            fill: function(_, i, all) {
                                var g = parseInt((i / all.length) * 255)
                                return "rgb(255, " + g + ", 0)"
                            }
                        }
                    },
                ],
                // table.recalc();
            });

            //charts
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

            // var ctx2 = document.getElementById("chart-line").getContext("2d");

            // // new Chart(ctx2, {
            // //     type: "line",
            // //     data: {
            // //         labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            // //         datasets: [{
            // //             label: "Mobile apps",
            // //             tension: 0,
            // //             borderWidth: 0,
            // //             pointRadius: 5,
            // //             pointBackgroundColor: "rgba(255, 255, 255, .8)",
            // //             pointBorderColor: "transparent",
            // //             borderColor: "rgba(255, 255, 255, .8)",
            // //             borderColor: "rgba(255, 255, 255, .8)",
            // //             borderWidth: 4,
            // //             backgroundColor: "transparent",
            // //             fill: true,
            // //             data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
            // //             maxBarThickness: 6

            // //         }],
            // //     },
            // //     options: {
            // //         responsive: true,
            // //         maintainAspectRatio: false,
            // //         plugins: {
            // //             legend: {
            // //                 display: false,
            // //             }
            // //         },
            // //         interaction: {
            // //             intersect: false,
            // //             mode: 'index',
            // //         },
            // //         scales: {
            // //             y: {
            // //                 grid: {
            // //                     drawBorder: false,
            // //                     display: true,
            // //                     drawOnChartArea: true,
            // //                     drawTicks: false,
            // //                     borderDash: [5, 5],
            // //                     color: 'rgba(255, 255, 255, .2)'
            // //                 },
            // //                 ticks: {
            // //                     display: true,
            // //                     color: '#f8f9fa',
            // //                     padding: 10,
            // //                     font: {
            // //                         size: 14,
            // //                         weight: 300,
            // //                         family: "Roboto",
            // //                         style: 'normal',
            // //                         lineHeight: 2
            // //                     },
            // //                 }
            // //             },
            // //             x: {
            // //                 grid: {
            // //                     drawBorder: false,
            // //                     display: false,
            // //                     drawOnChartArea: false,
            // //                     drawTicks: false,
            // //                     borderDash: [5, 5]
            // //                 },
            // //                 ticks: {
            // //                     display: true,
            // //                     color: '#f8f9fa',
            // //                     padding: 10,
            // //                     font: {
            // //                         size: 14,
            // //                         weight: 300,
            // //                         family: "Roboto",
            // //                         style: 'normal',
            // //                         lineHeight: 2
            // //                     },
            // //                 }
            // //             },
            // //         },
            // //     },
            // // });

            // var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

            // new Chart(ctx3, {
            //     type: "line",
            //     data: {
            //         labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            //         datasets: [{
            //             label: "Mobile apps",
            //             tension: 0,
            //             borderWidth: 0,
            //             pointRadius: 5,
            //             pointBackgroundColor: "rgba(255, 255, 255, .8)",
            //             pointBorderColor: "transparent",
            //             borderColor: "rgba(255, 255, 255, .8)",
            //             borderWidth: 4,
            //             backgroundColor: "transparent",
            //             fill: true,
            //             data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            //             maxBarThickness: 6

            //         }],
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
            //                     display: true,
            //                     padding: 10,
            //                     color: '#f8f9fa',
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //             x: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: false,
            //                     drawOnChartArea: false,
            //                     drawTicks: false,
            //                     borderDash: [5, 5]
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
        </script>
        {{-- <script>
            var $table = $('#table');
            $(function() {
                buildTable($table, 10, 1);
            });

            function expandTable($detail, cells) {
                buildTable($detail.html('<table></table>').find('table'), cells, 1);
            }

            function buildTable($el, cells, rows) {
                var i, j, row,
                    columns = [],
                    data = [];
                for (i = 0; i < cells; i++) {
                    columns.push({
                        field: 'field' + i,
                        title: 'Cell' + i,
                        sortable: true
                    });
                }
                for (i = 0; i < rows; i++) {
                    row = {};
                    for (j = 0; j < cells; j++) {
                        row['field' + j] = 'Row-' + i + '-' + j;
                    }
                    data.push(row);
                }
                $el.bootstrapTable({
                    columns: columns,
                    data: data,
                    detailView: cells > 1,
                    onExpandRow: function(index, row, $detail) {
                        expandTable($detail, cells - 1);
                    }
                });
            }
        </script> --}}
    @endpush
</x-layout>
