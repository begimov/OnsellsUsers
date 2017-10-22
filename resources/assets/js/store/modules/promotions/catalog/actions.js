import api from '../../../api'

export default {
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  getPromotions({ commit }, params) {
    commit('promotions/isLoading', true, { root: true })
    api.catalog.getPromotions(params).then(res => {
      commit('updatePromotions', res.data.promotions)
      commit('promotions/isLoading', false, { root: true })
    })
  }
}
