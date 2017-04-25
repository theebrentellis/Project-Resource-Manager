const state = {
    showModal: false,
    allProjects: {},
    allDevelopers: {},
    developer_id: "",
    project_id: "",
}

const actions = {
    openModal({ commit }) {
        commit('OPEN_MODAL');
    },
    closeModal({ commit }, formData) {

        formData.project_id = state.project_id;
        formData.developer_id = state.developer_id;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        formData._token = CSRF_TOKEN;
        formData._method = "POST";

        return Vue.http.post('/api/addTimeCard', formData)
            .then((response) => {
                console.log(response);
                if (response.status == 200) {
                    console.log("CLOSE_MODAL");
                    commit('CLOSE_MODAL');
                }
            }, (error) => {
                console.log("Error: " + error)
            });
    },
    getAllProjects() {
        return Vue.http.get('/api/allProjects')
            .then(function (response) {
                console.log("actions Response: " + response);
            }, function (error) {
                console.log("Error: " + error);
            })
    },
}

const mutations = {
    OPEN_MODAL(state) {
        console.log("modal.js OPEN_MODAL");
        state.showModal = true;
    },
    CLOSE_MODAL(state) {
        state.showModal = false;
        state.developer_id = "";
        state.project_id = "";
        location.reload();
    },
    SELECT_DEV_ID(state, id) {
        state.developer_id = id;
    },
    SELECT_PROJECT_ID(state, id) {
        state.project_id = id;
    }
}

const getters = {
    state: (state) => {
        return state;
    },
    allProjects: () => {
        return Vue.http.get('/api/allProjects')
            .then(function (response) {
                state.allProjects = response.data;
                return response.data;
            }, function (error) {
                console.log("Error: " + error);
            });
    },
    allDevelopers: () => {
        return Vue.http.get('/api/allDevelopers')
            .then(function (response) {
                state.allDevelopers = response.data;
                return response.data;
            }, function (error) {
                console.log("Error: " + error);
            });
    }
}

export default {
    state,
    actions,
    mutations,
    getters
}