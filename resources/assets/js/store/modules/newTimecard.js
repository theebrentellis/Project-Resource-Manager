const state = {
    showModal: false,
    allProjects: [],
    allDevelopers: [],
    developer_id: "",
    project_id: "",
}

const actions = {
    loadModalDevelopers: function ({ commit }) {
        axios.get('/api/developers')
            .then((response) => {
                commit('SET_MODAL_DEVELOPERS', { allDevelopers: response.data })
            }, (error) => {
                console.log(error);
            });
    },
    loadModalProjects: function ({ commit }) {
        axios.get('/api/projects')
            .then((response) => {
                commit('SET_MODAL_PROJECTS', { allProjects: response.data })
            }, (error) => {
                console.log(error);
            })
    },
    openModal: function ({ commit }) {
        commit('OPEN_MODAL');
    },
    closeModal: function ({ commit }, formData) {

        formData.project_id = state.project_id;
        formData.developer_id = state.developer_id;
        formData.role_id = 1;
        // formData._method = "POST";

        return axios.post('/api/timecards', formData)
            .then((response) => {
                console.log(response);
                if (response.status == 200) {
                    commit('CLOSE_MODAL');
                }
            }, (error) => {
                console.log("Error: " + error)
            });
    },
}

const mutations = {
    SET_MODAL_PROJECTS: (state, { allProjects }) => {
        state.allProjects = allProjects;
    },
    SET_MODAL_DEVELOPERS: (state, { allDevelopers }) => {
        state.allDevelopers = allDevelopers;
    },
    OPEN_MODAL: (state) => {
        state.showModal = true;
    },
    CLOSE_MODAL: (state) => {
        state.showModal = false;
        state.developer_id = "";
        state.project_id = "";
        location.reload();
    },
    SELECT_DEV_ID: (state, id) => {
        state.developer_id = id;
    },
    SELECT_PROJECT_ID: (state, id) => {
        state.project_id = id;
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