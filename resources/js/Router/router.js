import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Login from '../component/login/Login';
import Signup from "../component/login/Signup";
import Forum from "../component/forum/Forum"
import Logout from "../component/login/Logout";
import Read from "../component/forum/Read";
import Create from "../component/forum/Create";
import CreateCategory from "../component/category/CreateCategory";
const routes = [
    {path:'/login' , component:Login},
    {path:'/signup' , component:Signup},
    {path:'/ask' , component:Create,name:'ask'},
    {path:'/category' , component:CreateCategory,name:'category'},
    {path:'/forum' , component:Forum,name:'forum'},
    {path:'/logout' , component:Logout},
    {path:'/question/:slug' , component:Read, name:'read'},
]
const router = new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
})
export default router;
