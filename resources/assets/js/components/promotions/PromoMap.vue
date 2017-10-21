<template>
  <div>
    <div class="row">
      <gmap-map
      :center="center"
      :zoom="12"
      style="width: 100%; height: 500px">
        <gmap-marker
        :key="index"
        v-for="(m, index) in locations"
        :position="{lat:parseFloat(m.location[0]), lng:parseFloat(m.location[1])}"
        :clickable="true"
        @click="updateCenter(m.position)">
        <gmap-info-window><a :href="`/promotions/${m.promotion.id}`">{{ m.promotion.promotionname }}</a></gmap-info-window>
        </gmap-marker>
      </gmap-map>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters('promotions/promomap', [
      'center',
      'locations',
    ]),
  },
  methods: {
    ...mapActions('promotions/promomap', [
      'updateCenter',
      'getLocations',
    ]),
  },
  mounted() {
    this.getLocations()
  }
}
</script>
