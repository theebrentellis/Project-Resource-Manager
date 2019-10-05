const state = {
    showModal: false,
    role_id: "",
    user_id: "",
    project_id: "",
    errors: ""
}

const actions = {
    openModal: function ({ commit }) {
        commit('OPEN_MODAL');
    },
    closeSubmit: function ({ commit }, formData) {

        //Form Validation
        if (!formData.hours || !formData.project_id || !formData.role_id || !formData.user_id || !formData.date || !formData.notes) {
            
            let error = "Please Complete Timecard";
            commit("ERRORS", error);
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
    close: ({ commit }) => {
        commit("CLOSE_MODAL");
    },
    selectRole: ({ commit }, role_id) => {
        commit("SELECT_ROLE", role_id);
    },
    dismissError: ({ commit }) => {
        commit("DISMISS_ERROR");
    }
}

const mutations = {
    OPEN_MODAL: (state) => {
        state.showModal = true;
    },
    CLOSE_MODAL: (state) => {
        state.showModal = false;
        state.developer_id = "";
        state.project_id = "";
        state.errors = "";
    },
    SELECT_USER_ID: (state, id) => {
        state.user_id = id;
    },
    SELECT_PROJECT_ID: (state, id) => {
        state.project_id = id;
    },
    SELECT_ROLE: (state, role_id) => {
        state.role_id = role_id;
    },
    ERRORS: (state, error) => {
        state.errors = error;
    },
    DISMISS_ERROR: (state) => {
        state.errors = "";
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