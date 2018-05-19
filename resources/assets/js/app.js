require("./bootstrap");

window.Vue = require("vue");

Vue.component("sport-list", require("./components/SportList"));

const app = new Vue({
    el: "#app"
});
