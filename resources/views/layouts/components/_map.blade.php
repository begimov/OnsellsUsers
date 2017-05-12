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

  var mapOptions = {
    zoom: 13,
    center: {
      lat: 59.9307772,
      lng: 30.3276762
    },
  }

  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  var infoWindow = new google.maps.InfoWindow();

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

  $.ajax({
    url: 'webapi/locations',
    type: 'get',
    dataType: 'json',
    data: {
      lat: 59.9307772,
      lng: 30.3276762
    }
  }).done(function (response) {
    var i
    var marker
    var store
    var infoMarkup = []

    if (response.length !== 0) {
      for (i = 0; i < response.length; i++) {
        store = response[i]
        infoMarkup.push('<div><strong>' + store.promotion.company + '</strong><p>' + store.promotion.promotionname + '</p></div>');
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(store.location[0], store.location[1]),
          map: map
        });
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
          return function () {
            infoWindow.setContent('<div>' + infoMarkup[i] + '</div>')
            infoWindow.open(map, marker)
          }
        })(marker, i))
      }
    }
  })

}

</script>
