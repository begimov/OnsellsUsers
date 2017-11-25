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
      style="width: 100%; height: 500px;">

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
          <div class="media" style="max-width:300px;">
            <div class="media-left">
              <a href="#">
                <a :href="`/promotions/${m.promotion.id}`" target="_blank"><img class="media-object" :src="m.promotion.small_image.path"></a>
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading" style="font-size:1.1em;"><a :href="`/promotions/${m.promotion.id}`" target="_blank">{{ m.promotion.promotionname | strLimit(25) }}</a></h4>
              {{ m.promotion.promotiondesc | strLimit(110) }}
            </div>
          </div>     
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

        <div slot="visible">
          <div style="bottom: 50%; left: 50%; background-color: #2ea1a6; color: white; position: absolute; z-index: 100; padding:2px 5px; font-size:0.7em; border-radius: 3px;">
            {{ radius/1000 >= 1 ? Math.round(radius/1000*100)/100 + " км" : Math.round(radius) + " м" }}
          </div>
        </div>
      </gmap-map>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import helpers from "../../helpers";

export default {
  data() {
    return {
      showInfo: [],
      radius: 5000
    };
  },
  computed: {
    ...mapGetters("promotions/promomap", [
      "center",
      "locations",
      "icons",
      "getSearchQuery"
    ]),
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
    ...mapActions("promotions/promomap", [
      "updateCenter",
      "getLocations",
      "updateSearchQuery"
    ]),
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
      this.getLocations({
        center: this.center,
        radius: this.radius,
        searchQuery: this.searchQuery
      });
    }
  },
  filters: {
    strLimit: function(str, length) {
      return helpers.filters.strLimit(str, length)
    },
  },
  mounted() {
    this.locate();
    this.reloadLocations();
  }
};
</script>
