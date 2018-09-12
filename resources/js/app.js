
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';

import Notifications from 'vue-notification';
Vue.use(Notifications);


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import CreateSupplier from './components/CreateSupplier.vue';
import DisplaySupplier from './components/DisplaySupplier.vue';
import EditSupplier from './components/EditSupplier.vue';

import CreateOrder from './components/CreateOrder.vue';
import DisplayOrder from './components/DisplayOrder.vue';
import EditOrder from './components/EditOrder.vue';

import CreateProduct from './components/CreateProduct.vue';
import DisplayProduct from './components/DisplayProduct.vue';
import EditProduct from './components/EditProduct.vue';



const routes = [
  
  {
    name: 'CreateSupplier',
    path: '/suppliers/create',
    component: CreateSupplier
  },
  {
        name: 'DisplaySupplier',
        path: '/suppliers',
        component: DisplaySupplier
  },
  {
      name: 'EditSupplier',
      path: '/edit/:id',
      component: EditSupplier
   },

   {
    name: 'CreateOrder',
    path: '/orders/create',
    component: CreateOrder
  },
  {
     name: 'DisplayOrder',
     path: '/orders',
     component: DisplayOrder
  },
  {
      name: 'EditOrder',
      path: '/edit/:id',
      component: EditOrder
   },
   {
    name: 'CreateProduct',
    path: '/products/create',
    component: CreateProduct
  },
  {
    name: 'DisplayProduct',
    path: '/products',
    component: DisplayProduct
  },
  {
    name: 'EditProduct',
    path: '/edit/:id',
    component: EditProduct
   }
];


const router = new VueRouter({ mode: 'history', routes:routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');
