import api from '../../api'

export default {
  switchActiveComponent ({ commit }, value) {
    commit('switchActiveComponent', value)
  },
  updateCenter ({ commit }, value) {
    commit('updateCenter', value)
  },
}
