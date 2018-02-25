import { mapActions, mapGetters } from "vuex";
import helpers from "../../../helpers";
import $ from 'jquery';

export default {
  props: ["promotion", "center"],
  data() {
    return {
      distanceRangeFlag: 0
    };
  },
  computed: {
    ...mapGetters("promotions", [
      "icons"
    ]),
    distanceFromCenter() {
      const locations = this.promotion.locations;
      if (locations.length) {
        const lat = locations[0].location[0];
        const lng = locations[0].location[1];
        const distance = helpers.geo.distance(this.center, { lat, lng });
        this.distanceRangeFlag = distance < 4999 ? 0 : 1;
        return distance;
      }
    },
    distanceClasses() {
      return {
        label: true,
        "label-success": this.distanceRangeFlag === 0,
        "label-danger": this.distanceRangeFlag === 1
      };
    },
    popularity() {
      const applicationsCount = this.promotion.applications.length
      if (applicationsCount === 0) return 1
      return applicationsCount <= 5 ? applicationsCount : 5
    }
  },
  methods: {
    //
  },
  filters: {
    strLimit: function(str, length) {
      return helpers.filters.strLimit(str, length)
    },
    formatDistance: function(distance) {
      return distance > 999
        ? Math.round(distance / 10) / 100 + " км"
        : Math.round(distance) + " м";
    }
  },
  mounted() {
    $( document ).ready(function() {
      $(function () {
        $('[data-toggle="popover"]').popover()
      })
    });
  }
};