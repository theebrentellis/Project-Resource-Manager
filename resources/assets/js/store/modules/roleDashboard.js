const state = {
    role: 'dev',
    dashboardUser: {},
    dashboardRole: {},
}

const actions = {
    allRoleTimeCards: function ({ commit }) {
        commit('SET_ALL_ROLE_TIME_CARDS');
    },
    setDashboardUser: function ({ commit }, user) {
        commit('SET_DASHBOARD_USER', { user });
    },
    setDashboardRole: function ({ commit }, role) {
        commit('SET_DASHBOARD_ROLE', role);
    }
}

const mutations = {
    SET_DASHBOARD_ROLE: (state, role) => {
        state.dashboardRole = role;
        state.role = role.slug;
    },
    SET_DASHBOARD_USER: (state, { user }) => {
        state.dashboardUser = user;
    },
    SET_ALL_ROLE_TIME_CARDS: (state) => {
        state.dashboardUser = {};
    },
    // SET_DASHBOARD_ROLE_ID: (state, roleId) => {
    //     state.roleId = roleId;
    //     state.dashboardRoles.forEach((role) => {

    //     });
    // }
}

const getters = {

}

export default {
    state,
    actions,
    mutations,
    getters
}