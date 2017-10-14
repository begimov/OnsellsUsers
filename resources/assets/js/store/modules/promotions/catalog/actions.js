import api from '../../../api'

export default {
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  getPromotions({ commit }, params) {
    api.catalog.getPromotions(params).then(res => {
      commit('updatePromotions', res.data.promotions)
    })
  }
}
