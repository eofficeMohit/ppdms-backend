<style type="text/css">
    body {
        background: #edf2f7;
        padding: 50px;
    }
    div#map {
        border: 4px solid #fff;
        border-radius: 10px;
        box-shadow: 2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
      6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
      12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
      22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
      41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
      100px 100px 80px rgba(0, 0, 0, 0.07);
    }
</style>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="booth"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Booth Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Booth Management</h6>
                        </div>
                        <div class="card-body pt-2 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                        <div class="col-12 text-end">
                                            <a class="btn btn-primary" href="{{ route('booth') }}"> Back</a>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Booth Number:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->booth_no }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Total Voters:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->tot_voters }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Booth Name:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->booth_name }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Booth Name Uni:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->booth_name_uni }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Booth Latitude:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->latitude }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Booth Longitude:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->longitude }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>User:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->user->name }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Assembly:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $assembly[0] }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>District:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->district->name }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>State:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        {{ $booth->state->name }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        @if($booth->status == 1)
                                        <span class=" text-xs font-weight-bold badge bg-success">Active</span>
                                        @else
                                        <span class=" text-xs font-weight-bold badge bg-warning">In-Active</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid py-4">
                            <div id="map" style="height: 600px; width: 100%; max-width: 1000px; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

    {{-- @push('js') --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVrEx24ZfFiUpqeVW_1h2vwCqZT3aBZnk&callback=initMap" async
    defer></script>
  <script>
    const apiKey = 'AIzaSyBVrEx24ZfFiUpqeVW_1h2vwCqZT3aBZnk';
//   console.log('<?php echo $booth->longitude;?>');
  var latitude=parseFloat('<?php echo round($booth->latitude,4);?>');
  var longitude=parseFloat('<?php echo round($booth->longitude,4);?>');
  var title='<?php echo $booth->district->name;?>';
 
    const locations = [
      { lat: latitude, lng: longitude, title: title, color: 'green', active: true },
    ];
//   console.log(locations);
    const customMapStyles = [
      {
          "featureType": "administrative.province",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "administrative.locality",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "administrative.neighborhood",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [
              {
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
          "stylers": [
              {
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
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "poi.business",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "poi.government",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "poi.medical",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "poi.park",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "poi.place_of_worship",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "poi.school",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "on"
              }
          ]
      },
      {
          "featureType": "poi.sports_complex",
          "elementType": "all",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
              {
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
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
              {
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
          "stylers": [
              {
                  "color": "#7dcdcd"
              }
          ]
      }
  ]
  console.log(longitude);
    function initMap() {
      const mapOptions = {
        center: { lat: latitude, lng: longitude },
        zoom:7.5,
        styles: customMapStyles
      };
  
      const map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
      // Add markers for each location with different colors
      for (const location of locations) {
        const marker = new google.maps.Marker({
          position: { lat: location.lat, lng: location.lng },
          map: map,
          title: location.title,
          icon: location.active ? "http://maps.google.com/mapfiles/ms/icons/red.png" : "http://maps.google.com/mapfiles/ms/icons/blue.png"
          
        });
      }
    }
  </script>
  {{-- @endpush   --}}
</x-layout>


