<template>
    <div class="col-xl-2 col-lg-4 col-sm-6 col-padding">
        <div class="card text-center">
            <div class="card-header block-popularpromos-header" :style="{ backgroundImage: `url('${promotion.medium_image.path}')` }"></div>
            <div class="card-body">
                <h5>Бесплатный шот</h5>
                <p>Угощаем домашней фирменной настойкой всех клиентов наших парикмахеров после 18:00.</p>
                <a href="" class="btn btn-secondary btn-sm">ПОЛУЧИТЬ</a>
            </div>
        </div>
    </div>
  <!-- <div class="col-md-2 col-sm-4 col-xs-6">
        <a :href="'/promotions/' + promotion.id" target="_blank" class="thumbnail thumbnail--mini-card">
          <img class="img-rounded" :src="promotion.medium_image.path">
        </a>
        <p>
            <strong>{{ promotion.promotionname | strLimit(20) }}</strong><br>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotiondesc | strLimit(30) }}
            </a>
        </p>
    </div> -->
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
