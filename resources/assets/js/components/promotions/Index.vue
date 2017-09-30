<template>
  <div>
    <div class="row">
      <div class="col-md-12">
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
