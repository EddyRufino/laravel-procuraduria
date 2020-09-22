require('./bootstrap');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');
Vue.use(VueSweetalert2);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('delete-expediente', require('./components/deleteExpediente.vue').default);


const app = new Vue({
    el: '#app',
});
