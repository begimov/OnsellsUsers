<div class="row">
    <div class="col-md-12">
      @if (count($categories) > 0)
      <select name="category" id="category" class="form-control map-filter-category" onchange="filterMapOutput()">
        <option value="0" selected="selected">Все категории</option>
        @foreach ($categories as $category)
        <optgroup label="{{ $category->name }}">
          @foreach ($category->subcategories as $subcategory)
          <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
          @endforeach
        </optgroup>
        @endforeach
      </select>
      @endif
      <div class="map" id="map-canvas"></div>
    </div>
</div>

@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLEMAPS_API_KEY') }}&libraries=places&callback=initMap"></script>
@endsection

<script type="text/javascript">

  var map;
  var searchCircle;
  var infoWindow;
  var markersArray = [];

  function initMap() {
    var defaultCenterLat = 59.9307772;
    var defaultCenterLng = 30.3276762;
    var defaultSearchRadius = 5000;

    var mapOptions = {
      zoom: 12,
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
      ],
      mapTypeControl: false,
      streetViewControl: false,
    }

    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    infoWindow = new google.maps.InfoWindow();

    searchCircle = new google.maps.Circle({
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
      filterMapOutput();
    });
    google.maps.event.addListener(searchCircle, 'center_changed', function() {
      filterMapOutput();
    });

    filterMapOutput();

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          map.setCenter(pos);
          searchCircle.setCenter(pos);
      }, function() {
        // Browser supports Geolocation but smth went wrong
      });
    } else {
      // Browser doesn't support Geolocation
    }
  }

  function filterMapOutput() {
    getData(searchCircle.getCenter().lat(),
      searchCircle.getCenter().lng(),
      searchCircle.getRadius(),
      document.getElementById("category").value);
  }

  function getData(lat, lng, radius, category) {
    $.ajax({
      url: 'webapi/locations',
      type: 'get',
      dataType: 'json',
      data: {
        lat: lat,
        lng: lng,
        radius: radius,
        category: category
      }
    }).done(function (response) {
      var i;
      var marker;
      var store;
      var infoMarkup = [];

      // Clearing overlays
      for (var i = 0; i < markersArray.length; i++ ) {
        markersArray[i].setMap(null);
      }
      markersArray.length = 0;

      if (response.length !== 0) {
        for (i = 0; i < response.length; i++) {
          store = response[i];
          if (store.promotion) {
            infoMarkup.push('<p><strong>'
              + store.promotion.company.substr(0, 20)
              + '</strong></p><p><a href="promotions/'
              + store.promotion.id
              + '" target="_blank"><strong>'
              + store.promotion.promotionname.substr(0, 30)
              + '</strong></a></p><p>'
              + store.promotion.promotiondesc.substr(0, 60)
              + '</p>');
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
      }
    });
  }
</script>
