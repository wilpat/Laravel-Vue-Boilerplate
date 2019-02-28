import './bootstrap'
import Vue from 'vue'
import Index from './Index'
import routes from './router'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import storeData from './store'
import {initialize} from './helpers/general.js'


/*// Set Vue globally
window.Vue = Vue*/
// Load Index

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(storeData);
const router = new VueRouter({
	routes,
	mode: 'history'
})
// console.log(router)

initialize(store, router);

// Vue.component('index', Index)
const app = new Vue({
  el: '#app',
  store,
  router,
  components:{ Index }
});