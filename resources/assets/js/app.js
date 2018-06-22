
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./echo');

window.Vue = require('vue');

Vue.component('rf2', require('./components/rf2.vue'));
Vue.component('grid', require('./components/grid.vue'));

const app = new Vue({
    el: '#app',
    created() {
        this.callApi();
    },
    methods: {
        callApi() {
            let self = this;
            axios.get('/api/broadcast')
                .then(function (response) {
                    setTimeout(() => {
                        self.callApi();
                    }, 1000);
                });
        }
    }
});

