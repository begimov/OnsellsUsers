<template>
  <div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <div :class="{'text-left': isActiveComponentCatalog}">
          <a href="#" @click.prevent="switchActiveComponent('catalog')">В КАТАЛОГЕ</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <div :class="{'text-left': isActiveComponentPromoMap}">
          <a href="#" @click.prevent="switchActiveComponent('promomap')">НА КАРТЕ</a>
        </div>
      </div>
    </div>
    <div class="row">
      <catalog v-if="isActiveComponentCatalog"></catalog>
      <promomap v-if="isActiveComponentPromoMap"></promomap>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  computed: {
      ...mapGetters('promotions', [
          'isActiveComponentCatalog',
          'isActiveComponentPromoMap',
      ]),
  },
  methods: {
    ...mapActions('promotions', [
        'switchActiveComponent',
    ]),
  },
  mounted() {
    //
  }
}
</script>
