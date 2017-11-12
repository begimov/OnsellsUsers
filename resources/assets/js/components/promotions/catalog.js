import { mapActions, mapGetters } from "vuex";

export default {
  data() {
    return {
      timer: 0
    };
  },
  computed: {
    ...mapGetters("promotions/catalog", [
      "getSearchQuery",
      "promotions",
      "center"
    ]),
    searchQuery: {
      get() {
        return this.getSearchQuery;
      },
      set(value) {
        this.updateSearchQuery(value);
      }
    }
  },
  methods: {
    ...mapActions("promotions/catalog", ["updateSearchQuery", "getPromotions"]),
    textSearch() {
      clearTimeout(this.timer);
      this.timer = setTimeout(
        function() {
          this.getPromotions({
            searchQuery: this.searchQuery
          });
        }.bind(this),
        1000
      );
    }
  },
  mounted() {
    this.getPromotions();
  }
};