import Vue from 'vue';
import VueRouter from 'vue-router';
import Calculator from '../components/Calculator.vue';
import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import NotFound from '../components/partials/NotFound.vue';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'calculator',
            component: Calculator,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '*',
            component: NotFound,
        }
    ]
});