const state = {
    users: [],
    projects: [],
    timecards: []
}

const actions = {
    // loadAPITimecards: function ({ commit }) {
    //     axios.get('api/timecards')
    //         .then((response) => {
    //             commit('SET_API_TIMECARDS', { timecards: response.data })
    //         }, (error) => {
    //             console.log(error);
    //         });
    // },
    // loadAPIUsers: function ({ commit }) {
    //     var roleId = state.roleId;
    //     axios.get('api/users')
    //         .then((response) => {
    //             commit('SET_API_USERS', { users: response.data });
    //         }, (error) => {
    //             console.log(error);
    //         });
    // },
    // loadAPIProjects: function ({ commit }) {
    //     axios.get('/api/projects')
    //         .then((response) => {
    //             commit('SET_API_PROJECTS', { projects: response.data });
    //         }, (error) => {
    //             console.log(error);
    //         });
    // },
}

const mutations = {
    SET_API_TIMECARDS: (state, { timecards }) => {
        state.timecards = timecards;
    },
    SET_API_USERS: (state, { users }) => {
        state.users = users;
    },
    SET_API_PROJECTS: (state, { projects }) => {
        state.projects = projects;
    }
}

const getters = {
    
}

export default {
    state,
    actions,
    mutations,
    getters
}