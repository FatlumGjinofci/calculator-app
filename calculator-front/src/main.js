import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import store from "./store/index.js";
import './assets/tailwind.css'


router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!store.getters.loggedIn) {
      next({
        path: "/login",
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  } else {
    next(); // make sure to always call next()!
  }
});


new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
