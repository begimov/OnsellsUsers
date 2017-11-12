
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyDpzauf64hWOPsFTTlbVaQlB7Dn9gVyhc4',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
  }
})

import store from './store'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Base components
Vue.component('search', require('./components/base/Search.vue'));

Vue.component('index', require('./components/promotions/Index.vue'));
Vue.component('catalog', require('./components/promotions/Catalog.vue'));
Vue.component('promomap', require('./components/promotions/PromoMap.vue'));
Vue.component('promo-card', require('./components/promotions/promotion/PromoCard.vue'));
Vue.component('promo-mini-card', require('./components/promotions/promotion/PromoMiniCard.vue'));

const app = new Vue({
    el: '#app',
    store
});
