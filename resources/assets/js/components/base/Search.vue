<template>
  <div class="search--container">
    <div :class="{ 'input-group': query, 'form-group': true }">
      <input type="text" class="form-control" placeholder="Введите название акции, товара или услуги..."
        v-model="query"
        @input="changed">
      <span class="input-group-addon" v-if="query">
        <a href="#" @click.prevent="clear">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
      </span>
    </div>
    <span class="help-block help-block--searchbox"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Например, скидка на меню 50%, кофе, стрижка, массаж.</span>
  </div>
</template>

<script src="./search.js"></script>
