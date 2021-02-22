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
    name: "Toolbar"
}
</script>

<style scoped>

</style>
