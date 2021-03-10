<template>
    <v-container>
        <v-form @submit.prevent="signup">
            <v-text-field
                label="Name"
                type="text"
                v-model="form.name"
            ></v-text-field>
            <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
            <v-text-field
                label="Email"
                type="email"
                v-model="form.email"
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
            <v-text-field
                label="Password"
                type="password"
                v-model="form.password"
            >
            </v-text-field>
            <v-text-field
                label="Password"
                type="password"
                v-model="form.password_confirmation"
            >
            </v-text-field>
            <v-btn color="green" type="submit">
                Sign Up
            </v-btn>
            <router-link to="/login">
                <v-btn>Login</v-btn>
            </router-link>
        </v-form>
    </v-container>
</template>

<script>
export default {
name: "signup",
    data(){
        return {
            form:{
                name:null,
                email:null,
                password:null,
                password_confirmation:null
            },
            errors:{}
        }
    },
    created(){
        if (User.loggedIn()){
            this.$router.push({name:'forum'})
        }
    },
    methods:{
        signup(){
            axios.post('/api/user/signup',this.form).then(res => {
                User.responseAfterLogin(res)
                this.$router.push({name:'forum'})
            }).catch(error => console.log(error.res.data))
        }
    }
}
</script>

<style scoped>

</style>
