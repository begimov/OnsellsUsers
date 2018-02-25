<template>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-2">
      <div class="card">
        <div class="card-header block-popularpromos-header" :style="{ backgroundImage: `url('${promotion.medium_image.path}')` }"></div>
        <div class="card-body text-center">
          <img :src="(icons[promotion.category.parent_id])
            ? (icons[promotion.category.parent_id].icon)
            : (icons['default'].icon)" style="margin-top: -50px;">
          <h4>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotionname | strLimit(50) }}
            </a>
          </h4>
          <h4>
            <span class="label label-warning">
              <span v-for="n in popularity" :key="n" class="rating">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              </span>
            </span>
            <span v-bind:class="distanceClasses" v-if="distanceFromCenter">{{ distanceFromCenter | formatDistance }}</span>
          </h4>
          <hr>
          <p>{{ promotion.promotiondesc | strLimit(100) }}</p>
          <p>{{ promotion.category.name  | strLimit(30) }}</p>
          <a :href="'/promotions/' + promotion.id" target="_blank" class="btn btn-secondary btn-sm mb-3">ПОЛУЧИТЬ</a>
        </div>
      </div>
  </div>
</template>

<script src="./promocard.js"></script>
