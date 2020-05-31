@extends('layouts.app')

@section('content')
<div style="">

                    <div id="googleMap" style="width:100%;height:550px;"></div>
</div>
@endsection

@section('style')
<style> 
.google-label{
    background-color: white;
}
</style>
@endsection
@section('script')



<script>
function initMap() {

        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 8,
          center: {lat: 42.57469603846697, lng: 20.84208736010453},
          styles:[
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    }
]
        });
/*
        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length],
            url: 'http://www.google.com/',
            animation:google.maps.Animation.DROP
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});*/
                  var locations = [
      @foreach($requesters as $requester)
        {name:'{{$requester->name}}',lat: {{$requester->latitude}}, lng: {{$requester->longitude}}, url:"{{route('requester.profile', $requester->id)}}"},
      @endforeach
      ];
for (let key in locations) {
  console.log(key, locations[key].name);
  var mLatLng={lat: locations[key].lat,lng: locations[key].lng};
  var marker = new google.maps.Marker({
    position: mLatLng,
    map:map,
    title:locations[key].name,
    label: {
    color: '#333388',
    fontWeight: 'bold',
    text: locations[key].name,
  },
    url:locations[key].url,
    animation:google.maps.Animation.DROP

});
  google.maps.event.addListener(marker, "mouseover", function(evt) {
    var label = this.getLabel();
    label.color="black";
    this.setLabel(label);
  });
    google.maps.event.addListener(marker, "mouseout", function(evt) {
    var label = this.getLabel();
    label.color='#333388';
    this.setLabel(label);
  });
    google.maps.event.addListener(marker, 'click', function() {
    window.location.href = this.url;
});
}
      }




</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXqsuWqZ77GnXST-MWvh9dqeAfYh_JRMo&callback=initMap"></script>
@endsection