<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters('promotions/catalog', [
      'isActiveComponentCatalog',
      'isActiveComponentPromoMap',
    ]),
  },
  methods: {
    ...mapActions('promotions/catalog', [
      'switchActiveComponent',
    ]),
  },
  mounted() {
    //
  }
}
</script>
