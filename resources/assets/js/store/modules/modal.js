const state = {
    showModal: false,
    modalHeader: "",
    modalBody: "",
}

const actions = {
    openModal({ commit }) {
        console.log("modal.js openModal");
        commit('OPEN_MODAL');
    },
    closeModal({ commit }) {
        commit('CLOSE_MODAL');
    }
}

const mutations = {
    OPEN_MODAL(state) {
        console.log("modal.js OPEN_MODAL");
        state.showModal = true;
        state.modalHeader = "Sample Header";
        state.modalBody = "Sample Body";
        console.log(state);
        return state;
    },
    CLOSE_MODAL(state) {
        state.showModal = false;
        state.modalHeader = "";
        state.modalBody = "";
    }
}

const getters = {
    modalState: () => {
        // return console.log("getters modalState");
        // console.log(state);
        return state;
    }
}
const data = {
    showModal: false
}
export default {
    state,
    actions,
    mutations,
    data,
    getters
}