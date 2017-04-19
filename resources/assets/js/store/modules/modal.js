const state = {
    showModal: false,
    modalHeader: "",
    modalBody: "",
    allProjects: {},
    allDevelopers: {},
    dev_id: "",
    project_id: "",
    message: "Sample Message"
}

const actions = {
    openModal({ commit }, date) {
        commit('OPEN_MODAL', date);
    },
    closeModal({ commit }, formData) {
        console.log(formData);
        console.log("closeModal");
        return Vue.http.post('/api/assignTask', formData)
            .then((response) => {
                console.log(response);
                // commit('CLOSE_MODAL');
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
    OPEN_MODAL(state, date) {
        console.log("modal.js OPEN_MODAL");
        state.showModal = true;
        state.modalHeader = "Sample Header";
        state.modalBody = "Sample Body";
        state.date = date;
        return state;
    },
    CLOSE_MODAL(state) {
        state.showModal = false;
        state.modalHeader = "";
        state.modalBody = "";
        state.date = "";
        state.dev_id = "";
        state.project_id = "";
        return state;
    },
    SELECT_DEV_ID(state, id) {
        state.dev_id = id;
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
    },
    message: (state) => {
        return state.message;
    }
}
const data = {
    showModalData: "Sample Data"
}

export default {
    state,
    actions,
    mutations,
    data,
    getters
}