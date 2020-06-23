require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';

import store  from './store';
import VueRouter from 'vue-router';

vue.use(VueRouter);

import routes from './routes';

const router = new VueRouter({
    routes
});

new Vue({
    store,
    router,
    render: h => h(App)
  }).$mount("#app");
