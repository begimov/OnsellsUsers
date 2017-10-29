<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
        <ul class="nav nav-tabs nav-justified">
          <li role="presentation" :class="{'active': isActiveComponentCatalog}">
            <a href="#" @click.prevent="switchActiveComponent('catalog')">
              В КАТАЛОГЕ
            </a>
          </li>
          <li role="presentation" :class="{'active': isActiveComponentPromoMap}">
            <a href="#" @click.prevent="switchActiveComponent('promomap')">
              НА КАРТЕ
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <catalog v-if="isActiveComponentCatalog"></catalog>
      <promomap v-if="isActiveComponentPromoMap"></promomap>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters("promotions", [
      "isActiveComponentCatalog",
      "isActiveComponentPromoMap",
      "isLoading",
      "center"
    ])
  },
  methods: {
    ...mapActions("promotions", ["switchActiveComponent", "updateCenter"]),
    locate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          position => {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            this.updateCenter(pos);
          },
          function() {
            // Browser supports Geolocation but smth went wrong
          }
        );
      } else {
        // Browser doesn't support Geolocation
      }
    }
  },
  mounted() {
    this.locate();
  }
};
</script>
