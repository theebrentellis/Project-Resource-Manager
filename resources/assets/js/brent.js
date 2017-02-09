require("./bootstrap");

var example = new Vue({
    el: "#example",

    data: {
        message: "Brent's Message",
        counter: 0
    },
    methods: {
        brentModal: function() {
            console.log("Modal Fired!");
        }
    }
});