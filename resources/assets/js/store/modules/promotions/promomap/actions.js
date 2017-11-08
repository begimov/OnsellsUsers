import api from '../../../api'

export default {
  updateCenter ({ commit }, value) {
    commit('updateCenter', value)
  },
  getLocations ({ commit }, data) {
    commit('promotions/isLoading', true, { root: true })
    api.promomap.getLocations(data).then(res => {
      commit('updateLocations', res.data)
      commit('promotions/isLoading', false, { root: true })
    })
  },
  updateSearchQuery({ commit }, value) {
    commit('updateSearchQuery', value)
  },
}
