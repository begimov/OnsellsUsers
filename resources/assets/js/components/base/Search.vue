<template>
  <div :class="{ 'input-group': query, 'form-group search--container ': true }">
    <input type="text" class="form-control" placeholder="Введите ключевые слова..."
    v-model="query"
    @input="changed">
    <span class="input-group-addon" v-if="query">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </span>
  </div>
</template>

<script src="./search.js"></script>
