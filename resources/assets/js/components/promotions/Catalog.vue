<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <promo-card :promotion="promotion" :distanceFromCenter="distanceFromCenter(promotion)" v-for="promotion in promotions" :key="promotion.id"></promo-card>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import helpers from "../../helpers";

export default {
  data() {
    return {
      timer: 0
    };
  },
  computed: {
    ...mapGetters("promotions/catalog", [
      "getSearchQuery",
      "promotions",
      "center"
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
    ...mapActions("promotions/catalog", ["updateSearchQuery", "getPromotions"]),
    textSearch() {
      clearTimeout(this.timer);
      this.timer = setTimeout(
        function() {
          this.getPromotions({
            searchQuery: this.searchQuery
          });
        }.bind(this),
        1000
      );
    },
    distanceFromCenter(promotion) {
      if (promotion.locations.length) {
        const lat = promotion.locations[0].location[0]
        const lng = promotion.locations[0].location[1]
        return helpers.geo.distance(this.center, { lat, lng });
      }
    }
  },
  mounted() {
    this.getPromotions();
  }
};
</script>
