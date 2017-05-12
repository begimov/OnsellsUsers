<div class="row">
    <div class="col-md-12">
      <div class="map" id="map-canvas"></div>
    </div>
</div>

@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMyrdYOJBSg5uF81E3thcJJ2YHe7VrnoE&libraries=places&callback=initMap"></script>
@endsection

<script type="text/javascript">

function initMap() {
  // TODO: replace by geolocation data
  var defaultCenterLat = 59.9307772;
  var defaultCenterLng = 30.3276762;
  var defaultSearchRadius = 3000;
  var markersArray = [];

  var mapOptions = {
    zoom: 13,
    center: {
      lat: defaultCenterLat,
      lng: defaultCenterLng
    },
    styles: [
      {
        "featureType": "poi",
        "stylers": [
          { "visibility": "off" }
        ]
      }
    ]
  }

  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  var infoWindow = new google.maps.InfoWindow();

  var searchCircle = new google.maps.Circle({
      strokeColor: '#2ea1a6',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#2ea1a6',
      fillOpacity: 0.1,
      map: map,
      center: map.getCenter(),
      draggable: false,
      editable: true,
      radius: defaultSearchRadius
    });

    google.maps.event.addListener(searchCircle, 'radius_changed', function() {
      getData(searchCircle.getCenter().lat(), searchCircle.getCenter().lng(), searchCircle.getRadius());
    });
    google.maps.event.addListener(searchCircle, 'center_changed', function() {
      getData(searchCircle.getCenter().lat(), searchCircle.getCenter().lng(), searchCircle.getRadius());
    });

    getData(defaultCenterLat, defaultCenterLng, defaultSearchRadius);

  function getData(lat, lng, radius) {
    $.ajax({
      url: 'webapi/locations',
      type: 'get',
      dataType: 'json',
      data: {
        lat: lat,
        lng: lng,
        radius: radius + 700
      }
    }).done(function (response) {
      var i;
      var marker;
      var store;
      var infoMarkup = [];

      clearOverlays();

      if (response.length !== 0) {
        for (i = 0; i < response.length; i++) {
          store = response[i]
          infoMarkup.push('<div><strong>' + store.promotion.company + '</strong><p>' + store.promotion.promotionname + '</p></div>');
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(store.location[0], store.location[1]),
            map: map
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
              infoWindow.setContent('<div>' + infoMarkup[i] + '</div>')
              infoWindow.open(map, marker)
            }
          })(marker, i));
        }
      }
    });
    function clearOverlays() {
      for (var i = 0; i < markersArray.length; i++ ) {
        markersArray[i].setMap(null);
      }
      markersArray.length = 0;
    }
  }

  // TODO: GEOLOCATION
  // if (navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function(position) {
  //     var pos = {
  //       lat: position.coords.latitude,
  //       lng: position.coords.longitude
  //     };
  //     map.setCenter(pos);
  //   }, function() {
  //     // TODO: Browser supports Geolocation but smth went wrong
  //   });
  // } else {
  //   // TODO: Browser doesn't support Geolocation
  // }

}

</script>
