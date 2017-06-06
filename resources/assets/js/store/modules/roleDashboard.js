const state = {
    roleId: '1',
    dashboardTimeCards: [],
    dashboardProjects: [],
    dashboardUsers: [],
    dashboardUser: {},
    dashboardRoles: [],
    dashboardRole: {},
}

const actions = {
    loadDashboardTimeCards: function ({ commit }) {
        axios.get('/api/timecards')
            .then((response) => {
                commit('SET_DASHBOARD_TIME_CARDS', { timeCards: response.data })
            }, (error) => {
                console.log(error);
            });
    },
    loadDashboardUsers: function ({ commit }) {
        var roleId = state.roleId;
        axios.get('/api/users')
            .then((response) => {
                commit('SET_DASHBOARD_USERS', { users: response.data });
            }, (error) => {
                console.log(error);
            });
    },
    loadDashboardProjects: function ({ commit }) {
        axios.get('/api/projects')
            .then((response) => {
                commit('SET_DASHBOARD_PROJECTS', { projects: response.data });
            }, (error) => {
                console.log(error);
            });
    },
    loadDashboardRoles: function ({ commit }) {
        axios.get('/api/roles')
            .then((response) => {
                commit('SET_DASHBOARD_ROLES', { roles: response.data });
            }, (error) => {
                console.log(error);
            });
    },
    allRoleTimeCards: function ({ commit }) {
        commit('SET_ALL_ROLE_TIME_CARDS');
    },
    setDashboardUser: function ({ commit }, id) {
        state.dashboardUsers.forEach(function (user) {
            if (user.id == id) {
                commit('SET_DASHBOARD_USER', { user });
            }
        });
    },
    setDashboardRoleId: function ({ commit }, roleId) {
        commit('SET_DASHBOARD_ROLE_ID', roleId);
    }
}

const mutations = {
    SET_DASHBOARD_TIME_CARDS: (state, { timeCards }) => {
        state.dashboardTimeCards = timeCards;
    },
    SET_DASHBOARD_USERS: (state, { users }) => {
        state.dashboardUsers = users;
    },
    SET_DASHBOARD_PROJECTS: (state, { projects }) => {
        state.dashboardProjects = projects;
    },
    SET_DASHBOARD_USER: (state, { user }) => {
        state.dashboardUser = user;
    },
    SET_DASHBOARD_ROLES: (state, { roles }) => {
        state.dashboardRoles = roles;
        state.dashboardRoles.forEach((role) => {
            if (role.id == state.roleId) {
                state.dashboardRole = role;
            }
        });
    },
    SET_DASHBOARD_ROLE: (state, { role }) => {
        state.dashboardRole = role;
    },
    SET_ALL_ROLE_TIME_CARDS: (state) => {
        state.dashboardUser = {};
    },
    SET_DASHBOARD_ROLE_ID: (state, roleId) => {
        state.roleId = roleId;
        state.dashboardRoles.forEach((role) => {

        });
    }
}

const getters = {
    userTimeCards: (state) => {
        return state.dashboardTimeCards.filter((timeCard) => {
            return timeCard.user_id === state.dashboardUser.id;
        });
    },
    dashboardRole: (state) => {
        let theRole = {};
        state.dashboardRoles.filter((role) => {
            if (role.id == state.roleId) {
                theRole = role;
            }
        });
        return theRole;
    },
    dashboardUsersByRole: (state) => {
        var users = [];
        state.dashboardUsers.filter((user) => {
            user.user_roles.filter((role) => {
                if (role.role_id == state.roleId) {
                    return users.push(user);
                }
            });
        });
        return users;
    }

}

export default {
    state,
    actions,
    mutations,
    getters
}