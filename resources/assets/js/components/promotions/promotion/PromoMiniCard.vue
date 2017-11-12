<template>
  <div class="col-md-2 col-sm-4 col-xs-6">
        <a :href="'/promotions/' + promotion.id" target="_blank" class="thumbnail thumbnail--mini-card">
          <img class="img-rounded" :src="promotion.medium_image.path">
        </a>
        <p>
            <strong>{{ promotion.promotionname | strLimit(20) }}...</strong><br>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotiondesc | strLimit(30) }}...
            </a>
        </p>
    </div>
</template>
        
<script>
import helpers from "../../../helpers";

export default {
  props: ["promotion", "center"],
  data() {
    return {
      distanceRangeFlag: 0
    };
  },
  computed: {
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
      if (!str) return "";
      str = str.toString();
      return str.substring(0, length);
    },
    formatDistance: function(distance) {
      return distance > 999
        ? Math.round(distance / 10) / 100 + " км"
        : Math.round(distance) + " м";
    }
  },
  mounted() {
    //
  }
};
</script>
