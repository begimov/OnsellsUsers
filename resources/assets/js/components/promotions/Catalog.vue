<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <search v-model="searchQuery" v-on:input="textSearch"></search>
        </div>
      </div>
    </div>
    <div class="row" v-if="isDisplayingMiniCards && promotions.length">
      <div class="popular-minicards--container">
        <h4 class="header">Популярные акции</h4>
        <promo-mini-card  v-for="(promotion, index) in promotions" v-if="index < 6" :key="promotion.id" :promotion="promotion"></promo-mini-card>
      </div>
    </div>
    <div class="row" v-if="!isDisplayingMiniCards">
      <div class="popular-cards--container equal">
        <div class="row equal">
          <promo-card v-for="promotion in promotions" :promotion="promotion" :center="center" :key="promotion.id"></promo-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script src="./catalog.js"></script>
