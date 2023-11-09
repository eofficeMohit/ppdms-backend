<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <style>
        .table td,
        .table th {
            white-space: inherit;
        }
    </style>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="BoothWatch Live"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-lg-8 col-md-8 mb-md-0 mb-4">
                    <div class="card">
                        <div id="map" style="height: 600px; width: 100%; max-width: 1000px; margin: 0 auto;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6> Live Voting Overview </h6>
                            <h6> (Jalandhar) (Total Booths:1972) </h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true">
                                    <span class="font-weight-bold">1621800</span> Total voters</i>
                                <i class="fa fa-arrow-up text-warning" aria-hidden="true">
                                    <span class="font-weight-bold">888566 </span> Vote Polled</i>
                                <i class="fa fa-arrow-down text-danger" aria-hidden="true">
                                    <span class="font-weight-bold">24%</span> Voter Polled(%)</i>
                            </p>

                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-success text-gradient">notifications</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Voter Turnout
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
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Mock Poll Done</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-info text-gradient">shopping_cart</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Polled started</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-warning text-gradient">credit_card</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Setup Of Polling station
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
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Party Reached</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="material-icons text-dark text-gradient">payments</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Party Dispatch</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-10">
                                    <h6 class="text-danger text-center">Imformation on this e-portal is being updated
                                        through
                                        Mobile App by respective
                                        Sector Officers</h6>
                                    <p class="text-sm text-center mb-0">
                                        <i class="fa fa-arrow-up text-success" aria-hidden="true">
                                            <span class="font-weight-bold">1621800</span> Total voters</i>
                                        <i class="fa fa-arrow-up text-warning" aria-hidden="true">
                                            <span class="font-weight-bold">888566 </span> Vote Polled</i>
                                        <i class="fa fa-arrow-down text-danger" aria-hidden="true">
                                            <span class="font-weight-bold">24%</span> Voter Polled(%)</i>
                                </div>
                                <div class="col-lg-12 col-12 my-auto text-end">
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">District
                                                    Wise</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Assembly
                                                    Wise</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Booth
                                                    Wise</a></li>
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
                                                Districts</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Total Booths</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Party Dispatched(Numbers)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Party Arrived at PS(Numbers)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Set-up of Polling Station(Numbers)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Mock Poll Done(Numbers)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Poll Started(Numbers)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total Voters</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Vote Polled</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Voter Turnout(%)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Voter in Queqe at 6 PM </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Voter Turnout(%)</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Voter Turnout(%)</th>
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
                                                    {{-- <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <p class="mb-0 text-sm">
                                                                    {{ $election->electionState->name }}</p>
                                                            </div>

                                                        </div>
                                                    </td> --}}
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

            </div>


            <x-footers.auth>
            </x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&callback=initMap" async defer>
        </script>
        <script type="text/javascript">
            const apiKey = '{{ env('GOOGLE_MAP_API_KEY') }}';
            var locations = @json($locations);
            var center = locations[0];

            const customMapStyles = [{
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#e0efef"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "hue": "#1900ff"
                        },
                        {
                            "color": "#c0e8e8"
                        }
                    ]
                },
                {
                    "featureType": "poi.attraction",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi.government",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "poi.medical",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi.place_of_worship",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi.school",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "poi.sports_complex",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                            "lightness": 100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "lightness": 700
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#7dcdcd"
                    }]
                }
            ]

            function initMap() {
                const mapOptions = {
                    center: {
                        lat: 31.3260,
                        lng: 75.5762
                    },
                    zoom: 10,
                    styles: customMapStyles
                };

                const map = new google.maps.Map(document.getElementById('map'), mapOptions);

                // Add markers for each location with different colors
                for (const location of locations) {
                    const marker = new google.maps.Marker({
                        position: {
                            lat: location.latitude,
                            lng: location.longitude
                        },
                        map: map,
                        title: location.booth_name,
                        icon: location.assigned_status ? "http://maps.google.com/mapfiles/ms/icons/blue.png" :
                            "http://maps.google.com/mapfiles/ms/icons/red.png"

                    });
                }
            }
        </script>
    @endpush
</x-layout>
