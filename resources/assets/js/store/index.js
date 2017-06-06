import Vue from 'vue';
import Vuex from 'vuex';

import * as actions from './actions';
import * as mutations from './mutations';

import api from './modules/api';
import newTimecard from './modules/newTimecard';
import projectDashboard from './modules/projectDashboard';
import dashboard from './modules/roleDashboard';
import newButton from './modules/newButton';

Vue.use(Vuex);

Vue.config.debug = true;

export default new Vuex.Store({
    // actions,
    // mutations,
    modules: {
        api,
        newTimecard,
        projectDashboard,
        dashboard,
        newButton,
    },
    strict: true,
});