import Vue from 'vue';
import VueRouter from 'vue-router';
import Calculator from '../components/Calculator.vue';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/calculator',
            name: 'calculator',
            'component': Calculator
        }   
    ]
});