export default {
  data () {
    return {
      query: '',
    }
  },
  methods: {
    changed () {
      this.$emit('input', this.query)
    },
    clear () {
      this.query = ''
      this.changed()
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
