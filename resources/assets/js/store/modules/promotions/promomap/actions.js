import api from '../../../api'

export default {
  updateCenter ({ commit }, value) {
    commit('updateCenter', value)
  },
  getLocations ({ commit }, params) {
    commit('promotions/isLoading', true, { root: true })
    api.promomap.getLocations(params).then(res => {
      commit('updateLocations', res.data)
      commit('promotions/isLoading', false, { root: true })
    })
  },
}
