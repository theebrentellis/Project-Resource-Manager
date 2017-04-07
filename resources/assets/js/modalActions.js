module.exports = {
    openModal: function() {
        console.log("Open Modal!");
    },
    // openModal: function({ dispatch }, modalName, data) {
    //     console.log("In modalActions openModal");
    //     dispatch('OPEN_MODAL', modalName, data);
    // },
    closeModal: function() {
            console.log("Close Modal");
        }
        // closeModal: function({ dispatch }, data) {
        //     dispatch('CLOSE_MODAL', data);
        // },
};