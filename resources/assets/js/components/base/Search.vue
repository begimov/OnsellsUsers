<template>
  <div :class="{ 'input-group': query, 'form-group search--container ': true }">
    <input type="text" class="form-control" placeholder="Введите название акции, товара или услуги..."
      v-model="query"
      @input="changed">
    <span class="input-group-addon" v-if="query">
      <a href="#" @click.prevent="clear">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
      </a>
    </span>
  </div>
</template>

<script src="./search.js"></script>
