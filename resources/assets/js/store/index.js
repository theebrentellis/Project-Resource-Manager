import Vue from 'vue';
import Vuex from 'vuex';

import modal from './modules/modal';
import button from './modules/button';

Vue.use(Vuex);
Vue.config.debug = true;

// const mutations = require('./mutations.js');
// const modalActions = require('./modalActions.js');

export default new Vuex.Store({
    modules: {
        modal,
        button
    },
    // data: {
    //     showModal: false
    // },
    // mutations: {
    //     OPEN_MODAL(state) {
    //         console.log("store mutations OPEN_MODAL");
    //         state.showModal = true;
    //     }
    // },
    // actions: {
    //     openModal({ commit }) {
    //         console.log("store actions openModal");
    //         commit('OPEN_MODAL')
    //     }
    // },
    // strict: true,
});