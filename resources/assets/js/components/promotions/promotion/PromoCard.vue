<template>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail equal-min-height">
          <a :href="'/promotions/' + promotion.id" target="_blank">
            <img class="img-rounded" :src="promotion.medium_image.path">
          </a>
        <div class="caption">
          <h4>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotionname | strLimit(20) }}...
            </a>
          </h4>
          <p>{{ promotion.promotiondesc | strLimit(30) }}...</p>
          <p>{{ promotion.company + ' / ' + promotion.category.name  | strLimit(30) }}...</p>
          <h4 v-if="distanceFromCenter"><span v-bind:class="distanceClasses">Расстояние: {{ distanceFromCenter | formatDistance }}</span></h4>
          <h4>
            <span v-for="n in popularity" :key="n">
              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </span>
          </h4>
        </div>
      </div>
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
