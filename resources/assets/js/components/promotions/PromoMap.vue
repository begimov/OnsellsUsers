<template>
  <div>
    <div class="row">
      <gmap-map
      :center="center"
      :zoom="12"
      style="width: 100%; height: 500px">

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
        <a :href="`/promotions/${m.promotion.id}`">{{ m.promotion.promotionname }}</a>
        </gmap-info-window>
        
        </gmap-marker>

        <gmap-circle
        :center="center"
        :editable="true"
        :radius="5000"
        @radius_changed="radiusChanged">
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
      showInfo: []
    };
  },
  computed: {
    ...mapGetters("promotions/promomap", ["center", "locations", "icons"])
  },
  methods: {
    ...mapActions("promotions/promomap", ["updateCenter", "getLocations"]),
    clicked(index, position) {
      this.updateCenter(position);
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
      this.getLocations(radius)
    }
  },
  mounted() {
    this.locate();
    this.getLocations();
  }
};
</script>
