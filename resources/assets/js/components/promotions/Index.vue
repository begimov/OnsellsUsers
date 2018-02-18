<template>
  <div>
      <keep-alive><catalog v-if="isActiveComponentCatalog"></catalog></keep-alive>
      <keep-alive><promomap v-if="isActiveComponentPromoMap"></promomap></keep-alive>
  </div>
</template>

<script src="./indexcmp.js"></script>