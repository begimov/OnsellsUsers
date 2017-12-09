import { mapActions, mapGetters } from "vuex";
import helpers from "../../helpers";
import textSearch from "../mixins/textsearch";

export default {
  mixins: [textSearch],
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
    ...mapGetters("promotions", [
      "isLoading"
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
    instaTextSearch() {
      if (!this.isLoading) {
        clearTimeout(this.timer);
        this.reloadLocations();
      }
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