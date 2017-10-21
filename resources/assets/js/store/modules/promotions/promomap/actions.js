import api from '../../../api'

export default {
  updateCenter ({ commit }, value) {
    commit('updateCenter', value)
  },
  getLocations ({ commit }, radius = 5000) {
    commit('promotions/isLoading', true, { root: true })
    api.promomap.getLocations(radius).then(res => {
      commit('updateLocations', res.data)
      commit('promotions/isLoading', false, { root: true })
    })
  },
}
