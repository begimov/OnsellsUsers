<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 popular-cards--container">
        <h4 class="header">Популярные акции</h4>
        <promo-mini-card  v-for="(promotion, index) in promotions" v-if="!getSearchQuery && index < 6" :key="promotion.id" :promotion="promotion" :center="center"></promo-mini-card>
        <promo-card v-for="promotion in promotions" v-if="getSearchQuery" :promotion="promotion" :center="center" :key="promotion.id"></promo-card>
      </div>
    </div>
  </div>
</template>

<script src="./catalog.js"></script>
