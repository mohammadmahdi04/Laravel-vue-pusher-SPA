import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Login from '../component/login/Login';
import Signup from "../component/login/Signup";
import Forum from "../component/forum/Forum"
const routes = [
    {path:'/login' , component:Login},
    {path:'/signup' , component:Signup},
    {path:'/forum' , component:Forum,name:'forum'},
]
const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
})
export default router;
