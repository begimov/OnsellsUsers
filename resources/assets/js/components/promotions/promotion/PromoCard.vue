<template>
  <div class="col-md-3 col-sm-4 col-xs-6">
      <div class="thumbnail thumbnail--promo-card">
        <a :href="'/promotions/' + promotion.id" target="_blank">
          <img class="img-rounded" :src="promotion.medium_image.path">
        </a>
        <div class="caption text-center promo-card-caption">
          <img :src="(icons[promotion.category.parent_id])
            ? (icons[promotion.category.parent_id].icon)
            : (icons['default'].icon)">
          <h4>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotionname | strLimit(20) }}
            </a>
          </h4>
          <h4>
            <span class="label label-warning">
              <span v-for="n in popularity" :key="n" class="rating">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </span>
            </span>
            <span v-bind:class="distanceClasses" v-if="distanceFromCenter">{{ distanceFromCenter | formatDistance }}</span>
          </h4>
          <p>{{ promotion.promotiondesc | strLimit(100) }}</p>
          <p>{{ promotion.category.name  | strLimit(30) }}</p>
        </div>
      </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import helpers from "../../../helpers";

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
    //
  }
};
</script>
