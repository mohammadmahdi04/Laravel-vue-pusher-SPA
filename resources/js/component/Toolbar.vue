<template>
    <v-card
        color="grey lighten-4"
        flat
        tile
    >
        <v-toolbar dense>
<!--            <v-app-bar-nav-icon></v-app-bar-nav-icon>-->

            <v-toolbar-title>Title</v-toolbar-title>

            <v-spacer></v-spacer>
            <app-notification></app-notification>
            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show">
                <v-btn text>
                    {{item.title}}
                </v-btn>
            </router-link>

        </v-toolbar>
    </v-card>
</template>

<script>
import AppNotification from "./AppNotification";
export default {
    name: "Toolbar",
    components: {AppNotification},
    data(){
        return{
           items: [
               {title: 'Forum' ,to:'/forum',show:true } ,
               {title: 'Ask Question' ,to:'/ask',show:User.loggedIn() } ,
               {title: 'Category' ,to:'/category',show:User.loggedIn() } ,
               {title: 'Sign Up' ,to:'/signup',show:!User.loggedIn() } ,
               {title: 'Login' ,to:'/login',show:!User.loggedIn() } ,
               {title: 'Logout' ,to:'/logout',show:!User.loggedIn() } ,
           ]
        }
    },
    created() {
        EventBus.$on('logout',()=>{
            User.logout();
        });
    }
}
</script>

<style scoped>

</style>
