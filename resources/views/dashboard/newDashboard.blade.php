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
                                <h4 class="mb-0">{{$total_party_dispatch ?? 0}}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Party Reached</strong></p>
                                <h4 class="mb-0">{{$total_party_reached}}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Mock-Poll Started</strong></p>
                                <h4 class="mb-0">{{$total_mock_poll_started}}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
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
                                <p class="text-sm mb-0 text-capitalize"><strong>Poll Started</strong></p>
                                <h4 class="mb-0">{{ $poll_started }}</h4>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Booths</strong></p>
                                <h4 class="mb-0">24637</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row card_event mt-4">
				<div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Total Votes</strong></p>
                                <h4 class="mb-0">{{$tot_booth_votes}}</h4>
                            </div>
                            <div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Votes Polled</strong></p>
                                <h4 class="mb-0">{{$polled_booth_votes}}</h4>
                            </div>
							<div class="text-center pt-1">
                                <p class="text-sm mb-0 text-capitalize"><strong>Votes Polled(%)</strong></p>
                                <h4 class="mb-0">{{number_format(($polled_booth_votes/$tot_booth_votes)*100, 6)}}%</h4>
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
                                        @if(! $pollInterrupted->isEmpty())
                                            @foreach ($pollInterrupted as $key => $poll)
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $poll->id }}</p>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $poll->electionAssembly->asmb_name }}</p>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $poll->electionBooth->booth_name }}</p>

                                                    </div>
                                                </td>
												<td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $poll->electionBooth->booth_no }}</p>

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs text-secondary mb-0">{{ date('h:i',strtotime($poll->stop_time)) }}
                                                    </p>
                                                </td>
												<td class="align-middle text-center text-sm">
                                                    <p class="text-xs text-secondary mb-0">{{ date('h:i',strtotime($poll->resume_time)) }}
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
                                        <th
                                    </thead>
                                    <tbody>
                                        @if(! $electionInfo->isEmpty())
                                            @foreach ($electionInfo as $key => $election)
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $election->electionBooth->booth_no }}</p>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $election->electionBooth->booth_name }}</p>

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    @if($election->status ==1)
                                                        <span class=" text-xs font-weight-bold badge bg-success">Yes</span>
                                                    @else
                                                         <span class=" text-xs font-weight-bold badge bg-warning">No</span>
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Party Dispatch", "Party Reached", "Setup Booth", "Mock Poll", "Poll Started", "Poll Ended", "EVM Switch Off","Party Departed from PS","Party Reached at CC","EVM Deposited"],
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
    @endpush
</x-layout>
