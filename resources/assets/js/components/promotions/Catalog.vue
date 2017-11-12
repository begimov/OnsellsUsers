<template>
  <div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <search v-model="searchQuery" v-on:input="textSearch"></search>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 popular-cards--container">
        <promo-mini-card :promotion="promotion" :center="center" v-for="promotion in promotions" :key="promotion.id"></promo-mini-card>
      </div>
    </div>
  </div>
</template>

<script src="./catalog.js"></script>
