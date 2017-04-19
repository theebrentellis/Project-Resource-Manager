import Vue from 'vue';
import Vuex from 'vuex';

import modal from './modules/modal';
import button from './modules/button';

Vue.use(Vuex);

Vue.config.debug = true;


export default new Vuex.Store({
    modules: {
        modal,
        button
    },
    // data: {
    //     showModal: false
    // },
    // strict: true,
});