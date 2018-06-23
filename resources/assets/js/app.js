
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
    data() {
        return {
            keys: [],
            fetching: false
        }
    },
    mounted() {
        this.fetchKeys();
        this.callApi();
    },
    methods: {
        fetchKeys() {
            this.keys = this.$children.map(child => { return child.property });
        },
        callApi() {
            let self = this;

            if (this.fetching) {
                axios.post('/api/broadcast', {
                    keys: this.keys
                }).then(function (response) {
                    setTimeout(() => {
                        self.callApi();
                    }, 100);
                });
            }
        }
    },
    watch: {
        fetching: function (newVal, oldVal) {
            if (newVal) {
                this.callApi();
            }
        }
    },
});

