<template>
  <div class="col-md-3 col-sm-4 col-xs-6" style="margin-bottom:20px;">
      <div class="thumbnail thumbnail--promo-card">
        <a :href="'/promotions/' + promotion.id" target="_blank">
          <img class="img-rounded" :src="promotion.medium_image.path">
        </a>
        <div class="caption text-center promo-card-caption">
          <img :src="(icons[promotion.category.parent_id])
            ? (icons[promotion.category.parent_id].icon)
            : (icons['default'].icon)">
          <h4>
            <a :href="'/promotions/' + promotion.id" target="_blank">
              {{ promotion.promotionname | strLimit(20) }}
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
        </div>
      </div>
  </div>
</template>

<script src="./promocard.js"></script>
