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
  center (state) {
    return state.center
  },
  icons (state) {
    return state.icons
  },
}
