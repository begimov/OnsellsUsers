<template>
  <div>
    <div class="row">
      <gmap-map
  :center="{lat:10, lng:10}"
  :zoom="7"
  map-type-id="terrain"
  style="width: 500px; height: 300px"
></gmap-map>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    //
  }
}
</script>
