<template>
  <div>
    {{promotion.id}}
    {{promotion.name}}
  </div>
</template>

<script>
export default {
  props: ['promotion'],
  data () {
    return {

    }
  },
  computed: {
    //
  },
  methods: {
    //
  },
  mounted() {
    console.log(this.promotion);
  }
}
</script>
