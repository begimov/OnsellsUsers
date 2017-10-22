export default {
  isActiveComponentCatalog (state) {
    return state.activeComponent === 'catalog'
  },
  isActiveComponentPromoMap (state) {
    return state.activeComponent === 'promomap'
  },
  isLoading (state) {
    return state.isLoading
  },
}
