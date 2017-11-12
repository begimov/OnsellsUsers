<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
    <div class="row">
      <gmap-map
      :center="center"
      :zoom="12"
      style="width: 100%; height: 100%; position: absolute; z-index: 1; top: 50px; left: 0;">

        <gmap-marker
        :key="index"
        v-for="(m, index) in locations"
        :position="{lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])}"
        :clickable="true"
        :icon="(icons[m.promotion.category.parent_id])
                ? (icons[m.promotion.category.parent_id].icon)
                : (icons['default'].icon)"
        @click="clicked(index, {lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])})">

        <gmap-info-window
        @closeclick = "showInfo = []"
        :opened="showInfo[index] ? showInfo[index] : false">
        <a :href="`/promotions/${m.promotion.id}`" target="_blank">{{ m.promotion.promotionname }}</a>
        </gmap-info-window>
        
        </gmap-marker>

        <gmap-circle
        :center="center"
        :draggable="true"
        :editable="true"
        :radius="radius"
        :options="{
        strokeColor: '#2ea1a6',
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: '#2ea1a6',
        fillOpacity: 0.1}"
        @radius_changed="radiusChanged"
        @dragend="centerChanged">
        </gmap-circle>

      </gmap-map>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      showInfo: [],
      radius: 5000
    };
  },
  computed: {
    ...mapGetters("promotions/promomap", ["center", "locations", "icons", "getSearchQuery"]),
    searchQuery: {
      get() {
        return this.getSearchQuery;
      },
      set(value) {
        this.updateSearchQuery(value);
      }
    }
  },
  methods: {
    ...mapActions("promotions/promomap", ["updateCenter", "getLocations", "updateSearchQuery"]),
    clicked(index, position) {
      this.showInfo = [];
      this.showInfo[index] = true;
    },
    locate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          position => {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            this.updateCenter(pos);
          },
          function() {
            // Browser supports Geolocation but smth went wrong
          }
        );
      } else {
        // Browser doesn't support Geolocation
      }
    },
    radiusChanged(radius) {
      this.radius = radius;
      this.reloadLocations();
    },
    centerChanged(e) {
      const newCenter = { lat: e.latLng.lat(), lng: e.latLng.lng() };
      this.updateCenter(newCenter);
      this.reloadLocations();
    },
    textSearch() {
      clearTimeout(this.timer);
      this.timer = setTimeout(
        function() {
          this.reloadLocations();
        }.bind(this),
        1000
      );
    },
    reloadLocations() {
      this.getLocations({center: this.center, radius: this.radius, searchQuery: this.searchQuery});
    }
  },
  mounted() {
    this.locate();
    this.reloadLocations();
  }
};
</script>
