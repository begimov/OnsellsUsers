<template>
    <div class="col-xl-2 col-lg-4 col-sm-6 col-padding">
        <div class="card text-center">
            <div class="card-header block-popularpromos-header" :style="{ backgroundImage: `url('${promotion.medium_image.path}')` }"></div>
            <div class="card-body">
                <h5>{{ promotion.promotionname | strLimit(30) }}</h5>
                <p>{{ promotion.promotiondesc | strLimit(50) }}</p>
                <a :href="'/promotions/' + promotion.id" target="_blank" class="btn btn-secondary btn-sm">ПОЛУЧИТЬ</a>
            </div>
        </div>
    </div>
</template>
        
<script>
import helpers from "../../../helpers";

export default {
  props: ["promotion"],
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
