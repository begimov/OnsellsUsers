import api from '../../../api'

export default {
  updateSearchQuery ({ commit }, value) {
    commit('updateSearchQuery', value)
  },
  getPromotions({ commit }, value) {
    api.catalog.getPromotions().then(res => {
      console.log(res)
    })
  }
}
