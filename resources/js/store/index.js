import Vue from 'vue';
import Vuex from 'vuex';

import * as actions from './actions';
import * as mutations from './mutations';

import newTimecard from './modules/newTimecard';
import projectDashboard from './modules/projectDashboard';
import dashboard from './modules/roleDashboard';
import newButton from './modules/newButton';

Vue.use(Vuex);

Vue.config.debug = true;

export default new Vuex.Store({
    actions,
    mutations,
    modules: {
        newTimecard,
        projectDashboard,
        dashboard,
        newButton,
    },
    state: {
        users: [],
        roles: [],
        projects: [],
        timecards: []
    },
    strict: true,
});