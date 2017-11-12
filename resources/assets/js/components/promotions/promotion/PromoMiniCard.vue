<template>
  <div class="col-md-2 col-sm-4 col-xs-6">
        <a :href="'/promotions/' + promotion.id" target="_blank" class="thumbnail thumbnail--mini-card">
          <img class="img-rounded" :src="promotion.medium_image.path">
        </a>
        <p>
            <strong>{{ promotion.promotionname | strLimit(20) }}</strong><br>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotiondesc | strLimit(30) }}
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
      //
    };
  },
  computed: {
    //
  },
  methods: {
    //
  },
  filters: {
    strLimit: function(str, length) {
      return helpers.filters.strLimit(str, length)
    },
  },
  mounted() {
    //
  }
};
</script>
