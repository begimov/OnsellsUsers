<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <promo-card :promotion="promotion" v-for="promotion in promotions" :key="promotion.id"></promo-card>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  data () {
    return {
      timer: 0,
    }
  },
  computed: {
    ...mapGetters('promotions/catalog', [
      'getSearchQuery',
      'promotions',
    ]),
    'searchQuery': {
      get () {
        return this.getSearchQuery
      },
      set (value) {
        this.updateSearchQuery(value)
      }
    },
  },
  methods: {
    ...mapActions('promotions/catalog', [
      'switchActiveComponent',
      'updateSearchQuery',
      'getPromotions',
    ]),
    textSearch () {
      clearTimeout(this.timer);
      this.timer = setTimeout(function(){
          this.getPromotions({
            searchQuery: this.searchQuery
          })
      }.bind(this), 1000)
    },
  },
  mounted() {
    this.getPromotions()
  }
}
</script>
