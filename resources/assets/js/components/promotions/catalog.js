import { mapActions, mapGetters } from "vuex";
import textSearch from "../mixins/textsearch";

export default {
  mixins: [textSearch],
  data() {
    return {
      timer: 0
    };
  },
  computed: {
    ...mapGetters("promotions/catalog", [
      "getSearchQuery",
      "promotions",
      "center",
      "isDisplayingMiniCards"
    ]),
    ...mapGetters("promotions", [
      "isLoading"
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
    ...mapActions("promotions/catalog", [
      "updateSearchQuery",
      "getPromotions",
      "setIsDisplayingMiniCards"
    ]),
    instaTextSearch() {
      if (!this.isLoading) {
        clearTimeout(this.timer);
        this.getPromotions({
          searchQuery: this.searchQuery
        });
      }
    }
  },
  mounted() {
    this.getPromotions()
  }
};