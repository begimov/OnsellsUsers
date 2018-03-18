<template>
  <div>
      <div v-bind:class="{ 'isActive': isLoading, 'loader': true, 'loader-def': true }"></div>
      <keep-alive><catalog v-if="isActiveComponentCatalog" @setMapAsActive="switchActiveComponent('promomap')"></catalog></keep-alive>
      <keep-alive><promomap v-if="isActiveComponentPromoMap"></promomap></keep-alive>
  </div>
</template>

<script src="./indexcmp.js"></script>