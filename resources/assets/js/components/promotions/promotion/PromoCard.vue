<template>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail equal-min-height">
          <a href="">
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
          <p><span class="label label-primary">Расстояние {{ distanceFromCenter }}</span></p>
        </div>
      </div>
    </div>
</template>

<script>
import helpers from "../../../helpers";

export default {
  props: ['promotion', 'center'],
  data () {
    return {
      //
    }
  },
  computed: {
    distanceFromCenter() {
      const locations = this.promotion.locations
      if (locations.length) {
        const lat = locations[0].location[0]
        const lng = locations[0].location[1]
        return helpers.geo.distance(this.center, { lat, lng });
      }
    }
  },
  methods: {
    //
  },
  filters: {
    strLimit: function (str, length) {
      if (!str) return ''
      str = str.toString()
      return str.substring(0, length)
    }
  },
  mounted() {
    //
  }
}
</script>
