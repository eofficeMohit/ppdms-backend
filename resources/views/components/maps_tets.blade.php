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
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div id="map" style="height: 600px; width: 100%; max-width: 1000px; margin: 0 auto;">
            </div>
        </div>
    @push('js')


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVrEx24ZfFiUpqeVW_1h2vwCqZT3aBZnk&callback=initMap" async
  defer></script>
<script>
  const apiKey = 'AIzaSyBVrEx24ZfFiUpqeVW_1h2vwCqZT3aBZnk';

  const locations = [
    { lat: 31.3260, lng: 75.5762, title: 'Jalandhar', color: 'green', active: true },
    { lat: 31.3153, lng: 75.5670, title: 'Avtar Nagar', color: 'green', active: false },
    { lat: 31.3172, lng: 75.5575, title: 'Tej Mohan Nagar', color: 'red', active: false },
    { lat: 31.3308, lng: 75.5873, title: 'Fentonganj', color: 'red', active: true },
    { lat: 31.3281, lng: 75.5939, title: 'Gobind Garh', color: 'red', active: false },
    { lat: 31.3224, lng: 75.5873, title: 'Master Tara Singh Nagar', color: 'red', active: true },
    { lat: 31.3398, lng: 75.5916, title: 'Kishanpura', color: 'green', active: false },
    { lat: 31.3478, lng: 75.5926, title: 'Santokh Pura', color: 'green', active: false },
    { lat: 31.3239, lng: 75.5575, title: 'Basti Nau', color: 'green', active: false },
    { lat: 31.3334, lng: 75.5546, title: 'Mithu Basti', color: 'green', active: false },
    { lat: 31.3353, lng: 75.5386, title: 'Basti Bawa Khel', color: 'green', active: false },
    { lat: 31.3230, lng: 75.5437, title: 'Dilbagh Nagar', color: 'green', active: false },
    { lat: 31.2785, lng: 75.5830, title: 'Mithapur', color: 'green', active: false },
    { lat: 31.3110, lng: 75.6397, title: 'Rama Mandi', color: 'green', active: false },
    { lat: 30.9010, lng: 75.8573, title: 'Ludhiana', color: 'green', active: false },
    { lat: 30.8914, lng: 75.8181, title: 'Sarabha Nagar', color: 'green', active: false },
    { lat: 30.8977, lng: 75.8258, title: 'Gurdev Nagar', color: 'green', active: false },
    { lat: 30.9235, lng: 75.8689, title: 'Sunder Nagar', color: 'green', active: false },
    { lat: 30.9596, lng: 75.8389, title: 'Bahadarke', color: 'green', active: false },
    { lat: 30.9790, lng: 75.8425, title: 'Kasabad', color: 'green', active: false },
    // Add more locations here
  ];

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

  function initMap() {
    const mapOptions = {
      center: { lat: 31.3260, lng: 75.5762 },
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
@endpush
