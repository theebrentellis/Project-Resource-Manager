const state = {

}

const actions = {
    timecardModal: function ({ commit }) {
        console.log("timecardModal");
        commit('OPEN_MODAL');
    }
}
export default {
    state,
    actions
}