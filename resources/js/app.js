/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App.vue';
import Home from './components/Home.vue';
import Welcome from './components/Welcome.vue';


import { refreshState } from './store/actions';

import store from './store';

import { mapActions } from 'vuex';
import { mapState } from 'vuex';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: [
        // {
        //     path: '/',
        //     name: 'welcome',
        //     component: Welcome
        // },
        // {
        //     path: '/login',
        //     name: 'login'
        // },
        {
            path: '/app/home',
            name: 'home',
            component: Home
        }
    ],
});

window.App = new Vue({
    el: '#app',
    store,
    components: {
        App
        // calendar,
        // newtimecard,
        // projectdashboard,
        // roledashboard,
        // newbutton
    },
    router
});

refreshState(store);