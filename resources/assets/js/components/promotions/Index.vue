<template>
  <div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="lead"><strong>Акции и&nbsp;скидки рядом!</strong></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
            <a href="#" @click.prevent="switchActiveComponent('catalog')" 
              :class="{ 'active': isActiveComponentCatalog, 'btn btn-primary btn-lg btn-block btn--root': true }">
              В каталоге
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <a href="#" @click.prevent="switchActiveComponent('promomap')" 
              :class="{ 'active': isActiveComponentPromoMap, 'btn btn-primary btn-lg btn-block btn--root': true }">
              На карте
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <keep-alive><catalog v-if="isActiveComponentCatalog"></catalog></keep-alive>
      <keep-alive><promomap v-if="isActiveComponentPromoMap"></promomap></keep-alive>
    </div>
  </div>
</template>

<script src="./indexcmp.js"></script>