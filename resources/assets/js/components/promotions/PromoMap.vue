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
        @click="updateCenter(m.position)">
        <gmap-info-window>{{ m.name }}</gmap-info-window>
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
