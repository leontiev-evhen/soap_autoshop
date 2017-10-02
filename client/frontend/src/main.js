// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
//import BootstrapVue from 'bootstrap-vue'
/* ...there may be other imports here */
//import 'bootstrap-vue/dist/bootstrap-vue.css'
//import 'bootstrap/dist/css/bootstrap.css'

import axios from 'axios'
import VueAxios from 'vue-axios'

import VeeValidate from 'vee-validate';

//Vue.use(BootstrapVue)
Vue.use(VeeValidate)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
