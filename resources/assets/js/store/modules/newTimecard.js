const state = {
    showModal: false,
    timecardProjects: [],
    timecardRoles: [],
    timecardUsers: [],
    role_id: "",
    // user_id: "",
    // project_id: "",
    errors: ""
}

const actions = {
    loadTimecardUsers: function ({ commit }) {
        axios.get('/api/users')
            .then((response) => {
                commit('SET_TIMECARD_USERS', { allUsers: response.data })
            }, (error) => {
                console.log(error);
            });
    },
    loadTimecardProjects: function ({ commit }) {
        axios.get('/api/projects')
            .then((response) => {
                commit('SET_TIMECARD_PROJECTS', { allProjects: response.data })
            }, (error) => {
                console.log(error);
            })
    },
    loadTimecardRoles: function ({ commit }) {
        axios.get('api/roles')
            .then((response) => {
                commit('SET_TIMECARD_ROLES', { allRoles: response.data })
            }, (error) => {
                console.log(error);
            });
    },
    openModal: function ({ commit }) {
        commit('OPEN_MODAL');
    },
    closeModal: function ({ commit }, formData) {

        //Form Validation
        if (!formData.hours || !formData.project_id || !formData.role_id || !formData.user_id || !formData.date || !formData.notes) {
            state.errors = "Please Complete Timecard";
        }
        else {

            return axios.post('/api/timecards', formData)
                .then((response) => {
                    if (response.status == 200) {
                        commit('CLOSE_MODAL');
                    }
                }, (error) => {
                    console.log(error)
                });
        }
    },
}

const mutations = {
    SET_TIMECARD_PROJECTS: (state, { allProjects }) => {
        state.timecardProjects = allProjects;
    },
    SET_TIMECARD_USERS: (state, { allUsers }) => {
        state.timecardUsers = allUsers;
    },
    SET_TIMECARD_ROLES: (state, { allRoles }) => {
        state.timecardRoles = allRoles;
    },
    OPEN_MODAL: (state) => {
        state.showModal = true;
    },
    CLOSE_MODAL: (state) => {
        state.showModal = false;
        state.developer_id = "";
        state.project_id = "";
        state.errors = "";
        // location.reload();
    },
    SELECT_USER_ID: (state, id) => {
        state.user_id = id;
    },
    SELECT_PROJECT_ID: (state, id) => {
        state.project_id = id;
    },
    SELECT_ROLE_ID: (state, id) => {
        state.role_id = id;
    }
}

const getters = {
    timecardUsersByRole: (state) => {
        let users = [];
        state.timecardUsers.filter((user) => {
            user.user_roles.filter((role) => {
                if (role.role_id == state.role_id) {
                    return users.push(user);
                }
            });
        });
        return users;
    },
    timecardRole: (state) => {
        let theRole = {};
        state.timecardRoles.filter((role) => {
            if (role.id == state.role_id) {
                theRole = role;
            }
        });
        return theRole;
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}