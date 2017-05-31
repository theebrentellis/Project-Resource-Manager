import Vue from 'vue';
import Vuex from 'vuex';

import api from './modules/api';
import newTimecard from './modules/newTimecard';
import projectDashboard from './modules/projectDashboard';
import dashboard from './modules/roleDashboard';

Vue.use(Vuex);

Vue.config.debug = true;

export default new Vuex.Store({
    modules: {
        api,
        newTimecard,
        projectDashboard,
        dashboard
    },
    // strict: true,
});