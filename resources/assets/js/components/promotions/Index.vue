<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
            <a href="#" @click.prevent="switchActiveComponent('catalog')" 
              :class="{ 'active': isActiveComponentCatalog, 'btn btn-primary btn-lg btn-block': true }">
              В КАТАЛОГЕ
            </a>
            
      </div>
      <div class="col-md-6">
        <a href="#" @click.prevent="switchActiveComponent('promomap')" 
              :class="{ 'active': isActiveComponentPromoMap, 'btn btn-primary btn-lg btn-block': true }">
              НА КАРТЕ
        </a>
      </div>
    </div>
    <div class="row">
      <catalog v-if="isActiveComponentCatalog"></catalog>
      <promomap v-if="isActiveComponentPromoMap"></promomap>
    </div>
  </div>
</template>

<script src="./indexcmp.js"></script>
