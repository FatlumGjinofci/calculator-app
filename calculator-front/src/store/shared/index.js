const state = {
    error: null
};
const getters = {
    error(state) {
        return state.error
    }
};
const mutations = {
    setError(state, payload) {
        state.error = payload
    },
    clearError(state) {
        state.error = null
    }
};

const actions = {
    setError({commit}, payload) {
        commit('setError', payload)
    },
    clearError({commit}) {
        commit('clearError')
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};