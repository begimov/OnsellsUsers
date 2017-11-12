export default {
  center (state) {
    return state.center
  },
  locations (state) {
    return state.locations
  },
  icons (state, getters, rootState, rootGetters) {
    return rootGetters['promotions/icons']
  },
  getSearchQuery (state) {
    return state.searchQuery
  },
}
