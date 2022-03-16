/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
window.bootstrap = require('bootstrap');
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const header_for_fetch =  {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
// import Modal from './components/products/ModalShow.vue' // Modal.vue';
var myModal = null;
var staticBackdrop = document.getElementById('staticBackdrop');
window.onload = function() {

    if( staticBackdrop ){
        myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {})
    }
    
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}

const app = new Vue({
    el: '#app',
    data : {
        producto : {
            "id":"",
            "provider_id":"",
            "code":"",
            "name":"",
            "price":0,
            "stock":0,
            "provider" :{},
            "created_at":"",
            "updated_at":"",
            "deleted_at":null
        },
        sucursales : []
    },

    methods : {
        getInfoProduct(id){
            fetch('http://localhost:4003/api/productos/'+id,{
                headers : header_for_fetch,
                method: 'GET'
            })
            .then(data=>data.json())
            .then(resp=>{
                Object.assign(this.producto, resp.producto);
                Object.assign(this.sucursales, resp.sucursales);
                myModal.toggle();
            })
        },
    }
});
