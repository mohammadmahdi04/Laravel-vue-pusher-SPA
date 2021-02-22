<template>
    <v-card
        color="grey lighten-4"
        flat
        height="200px"
        tile
    >
        <v-toolbar dense>
<!--            <v-app-bar-nav-icon></v-app-bar-nav-icon>-->

            <v-toolbar-title>Title</v-toolbar-title>

            <v-spacer></v-spacer>
            <router-link to="/forum">
                <v-btn text>
                    Forum
                </v-btn>
            </router-link>
            <router-link to="/signup">
                <v-btn text>
                    Sign Up
                </v-btn>
            </router-link>
            <router-link to="/login">
                <v-btn text>
                    Login
                </v-btn>
            </router-link>

        </v-toolbar>
    </v-card>
</template>

<script>
export default {
    name: "Toolbar",
    data(){
        return{
           items: [
               {title: 'Forum' ,to:'/forum',show:true } ,
               {title: 'Login' ,to:'/login',show:!User.loggedIn() } ,
               {title: 'Logout' ,to:'/logout',show:!User.loggedIn() } ,
           ]
        }
    }
}
</script>

<style scoped>

</style>
