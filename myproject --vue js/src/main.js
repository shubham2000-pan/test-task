// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import NProgress from 'nprogress';

import App from './App.vue';
import Create from './components/Create.vue';
import Edit from './components/Edit.vue';
import Index from './components/Index.vue';
import Welcome from './components/Welcome.vue';
import Registration from './components/Registration.vue';
import Login from './components/Login.vue';
import ForgotPassword from './components/ForgotPassword.vue';
import Update from './components/Update.vue';

import '../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../node_modules/nprogress/nprogress.css';

Vue.use(VueRouter);
Vue.use(Vuex)
Vue.use(VueAxios, axios);

Vue.config.productionTip = false;

const routes = [
  
  {
    name: 'Create',
    path: '/create',
    component: Create
  },
  {
    name: 'Edit',
    path: '/edit',
    component: Edit
  },
  {
    name: 'Index',
    path: '/index',
    component: Index
  },
  {
    name: 'Welcome',
    path: '/Welcome',
    component: Welcome
  },
  {
    name: 'Welcome',
    path: '/Welcome',
    component: Welcome
  },
  {
    name: 'Registration',
    path: '/Registration',
    component: Registration
  },
  {
    name: 'Login',
    path: '/',
    component: Login
  },
  {
    name: 'Update',
    path: 'Update',
    component: Update
  },
  {
    name: 'ForgotPassword',
    path: '/ForgotPassword',
    component: ForgotPassword
  },
  
  ]

const router = new VueRouter({ mode: 'history', routes: routes });

router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
});

router.afterEach(() => {
  NProgress.done()
});

new Vue({
  render: h => h(App),
  router
}).$mount('#app')