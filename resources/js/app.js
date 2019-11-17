
require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('approve-loan', require('./components/Approve.vue').default);

const app = new Vue({
    el: '#app',
});
