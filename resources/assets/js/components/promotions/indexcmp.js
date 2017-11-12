import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters("promotions", [
      "isActiveComponentCatalog",
      "isActiveComponentPromoMap",
      "isLoading",
      "center"
    ])
  },
  methods: {
    ...mapActions("promotions", ["switchActiveComponent", "updateCenter"]),
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
    }
  },
  mounted() {
    this.locate();
  }
};