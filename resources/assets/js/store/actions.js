import * as types from './mutations';

export const newTimecard = ({ commit }) => {
    commit('OPEN_MODAL');
    console.log("Actions New Timecard");
}