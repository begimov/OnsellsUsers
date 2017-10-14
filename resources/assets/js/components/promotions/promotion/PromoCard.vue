<template>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail equal-min-height">
          <a href="">
            <img class="img-rounded" src="">
          </a>
        <div class="caption">
          <h4>
            <a href="">
              {{ promotion.promotionname }}
            </a>
          </h4>
          <p>{{ promotion.promotiondesc }}</p>
          <p>{{ promotion.company + ' / ' + promotion.category.name }}</p>
        </div>
      </div>
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
    //
  }
}
</script>
