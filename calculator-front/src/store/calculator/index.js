import axios from 'axios';
import baseUrl from '../../../baseUrl.js';

const state = {
    calculations: [],
    calculation: {},
};

const getters = {

};

const mutations = {
    SET_CALCULATIONS(state, calculations) {
        state.calculations = calculations;
    },
    SET_CALCULATION(state, calculation) {
        state.calculation = calculation;
    }
};

const actions = {

    getCalculations(context) {
        axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("token");

        axios.get(`${baseUrl}/history`).then(response => {
            context.commit('SET_CALCULATIONS', response.data)
        })
        .catch(error => { console.log(error) })
    },

    createCalculation(context, calculation) {
        axios.defaults.headers.common["Authorization"] =
        "Bearer " + localStorage.getItem("token");

        axios.post(`${baseUrl}/calculations`, {
            calculation
        })
        .then(() => {
            context.commit('SET_CALCULATION', calculation)
        })
        .finally(() => {
            context.dispatch('getCalculations');
        })
        .catch(error => { console.log(error) })
    },
};

export default {
    state, 
    getters,
    actions,
    mutations
}