<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
import Login from "./login/Login";
import AppFooter from "./AppFooter";
import Toolbar from "./Toolbar";
export default {
    name: "AppHome",
    components: {Toolbar, AppFooter}
}
</script>

<style scoped>

</style>
