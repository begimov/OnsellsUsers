import api from '../../../api'
import helpers from "../../../../helpers";

export default {
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  getPromotions({ commit, state }, params) {
    commit('promotions/isLoading', true, { root: true })
    api.catalog.getPromotions(params).then(res => {
      if (state.searchQuery) {
        const newPromotions = _.mapValues(res.data.promotions, function(promotion) {
          promotion.distance = 1 
          return promotion; 
        });
        console.log(newPromotions)
      }
      commit('updatePromotions', res.data.promotions)
      commit('promotions/isLoading', false, { root: true })
    })
  }
}
