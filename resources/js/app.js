
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// GENERIC
Vue.component('date-picker', require('vue2-datepicker').default);
Vue.component('toggle-button', require('vue-js-toggle-button/src/Button.vue').default);
Vue.component('moment', require('moment'));
Vue.component('snotify', require('vue-snotify'));

// STUDENTS
Vue.component('list-students', require('./components/student/list-students.vue').default);
Vue.component('new-student', require('./components/student/new-student.vue').default);

// PRODUCTS
Vue.component('list-product-categories', require('./components/product/list-product-categories.vue').default);
Vue.component('list-products', require('./components/product/list-products.vue').default);
Vue.component('new-product', require('./components/product/new-product.vue').default);
Vue.component('new-session', require('./components/product/new-session.vue').default);

// BILLS
Vue.component('edit-bill', require('./components/bill/edit-bill.vue').default);
Vue.component('list-bills', require('./components/bill/list-bills.vue').default);
Vue.component('bills-total', require('./components/bill/bills-total.vue').default);

// PLAYER
Vue.component('audio-player', require('./components/player/audio-player.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
