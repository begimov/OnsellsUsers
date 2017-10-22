import catalog from './catalog'
import promomap from './promomap'
import state from './state'
import getters from './getters'
import actions from './actions'
import mutations from './mutations'

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
  modules: {
    catalog,
    promomap
  }
}
