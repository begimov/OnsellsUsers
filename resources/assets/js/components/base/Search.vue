<template>
  <div>
    <div :class="{ 'input-group': query, 'form-group': true, 'm-0': true }">
      <input type="text" class="form-control form-control-lg" placeholder="Введите название акции, товара или услуги..."
        v-model="query"
        @input="changed"
        @keyup.enter="enterPressed">
      <span class="input-group-addon" v-if="query">
        <a href="#" @click.prevent="clear">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
      </span>
    </div>
  </div>
</template>

<script src="./search.js"></script>