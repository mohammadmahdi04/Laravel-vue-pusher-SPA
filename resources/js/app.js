require('./bootstrap');
import Vue from  'vue';
import router from './Router/router';
// import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css'
// const opts = {}
// export default new Vuetify(opts)
import Vuetify from "vuetify";
Vue.use(Vuetify);
import User from "./Helpers/User";
window.User = User;
Vue.component('app-home',require('./component/AppHome.vue').default);
const app = new Vue({
    el:'#app',
    vuetify:new Vuetify,
    router,
})
