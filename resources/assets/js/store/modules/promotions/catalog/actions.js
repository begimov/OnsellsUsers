import api from '../../../api'
import helpers from "../../../../helpers";

export default {
  updateSearchQuery({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  getPromotions({ commit, state, rootGetters }, params) {
    commit('promotions/isLoading', true, { root: true })
    api.catalog.getPromotions(params).then(res => {
      if (state.searchQuery) {
        const newPromotions = _.sortBy(
          calculateDistance(res.data.promotions, rootGetters['promotions/center']),
          [function (o) { return o.distance; }])
        commit('updatePromotions', newPromotions)
      } else {
        const newPromotions = _.sortBy(res.data.promotions, [function (o) { return o.applications.length; }])
        commit('updatePromotions', newPromotions.reverse())
      }
      commit('promotions/isLoading', false, { root: true })
    })
  }
}

const calculateDistance = (promotions, center) => {
  return _.mapValues(promotions, function (promotion) {
    if (promotion.locations.length) {
      const lat = promotion.locations[0].location[0]
      const lng = promotion.locations[0].location[1]
      promotion.distance = helpers.geo.distance(center, { lat, lng })
    }
    return promotion;
  });
} 
