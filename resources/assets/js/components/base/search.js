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
    },
    enterPressed () {
      this.$emit('enterPressed')
    }
  },
  computed: {
    //
  },
  mounted() {
    //
  }
}
