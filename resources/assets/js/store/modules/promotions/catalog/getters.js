export default {
  getSearchQuery (state) {
    return state.searchQuery
  },
  promotions (state) {
    return state.promotions
  },
  center (state, getters, rootState, rootGetters) {
    return rootGetters['promotions/center']
  },
}
