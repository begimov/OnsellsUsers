<template>
  <div class="form-group search--container">
    <input type="text" class="form-control" placeholder="Введите ключевые слова..."
    v-model="query"
    @input="changed">
  </div>
</template>

<script src="./search.js"></script>
