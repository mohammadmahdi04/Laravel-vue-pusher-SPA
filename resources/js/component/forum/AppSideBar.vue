<template>
    <v-card width="100%" class="mt-1" height="auto">
        <v-toolbar
            color="cyan"
            dark
            dense
            width="100%"
        >
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list v-for="category in categories" :key="category.id">
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title >{{category.name}}</v-list-item-title>
<!--                    <v-list-item-subtitle >cat</v-list-item-subtitle>-->
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-card>
</template>

<script>
export default {
    name: "AppSideBar",
    data(){
        return {
            categories:null
        }
    },
    created() {
        axios.get('/api/category').then(res =>this.categories = res.data.data)
    }
}
</script>

<style scoped>

</style>
