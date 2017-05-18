import Vue from 'vue';
import Vuex from 'vuex';

import api from './modules/api';
import modal from './modules/modal';
import projectDashboard from './modules/projectDashboard';
import dashboard from './modules/roleDashboard';

Vue.use(Vuex);

Vue.config.debug = true;

export default new Vuex.Store({
    modules: {
        api,
        modal,
        projectDashboard,
        dashboard
    },
    // strict: true,
});