<template>
  <div>
    <div class="row">
      <gmap-map
      :center="center"
      :zoom="7"
      style="width: 100%; height: 300px">
        <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        :clickable="true"
        :draggable="true"
        @click="center=m.position">
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
      'markers',
    ]),
  },
  mounted() {
    //
  }
}
</script>
