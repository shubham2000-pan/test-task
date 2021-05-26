import Vue from 'vue'
import Router from 'vue-router'
import Login from './components/Login.vue';

Vue.use(Router)
Vue.use(VueAxios, axios);

Vue.config.productionTip = false;
export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    }
  ]
})
