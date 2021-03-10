 <template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
                label="Email"
                type="email"
                v-model="form.email"
            ></v-text-field>
            <v-text-field
                label="Password"
                type="password"
                v-model="form.password"
            >
            </v-text-field>
            <v-btn color="green" type="submit">
                Login
            </v-btn>
          <router-link to="/signup">
              <v-btn>Sign Up</v-btn>
          </router-link>
        </v-form>
    </v-container>
</template>
<script>
export default {
   data(){
       return{
           form:{
             email:null,
             password:null
           }
       }
   },
    created(){
      if (User.loggedIn()){
          this.$router.push({name:'forum'})
      }
    },
    methods:{
        login(){
            User.login(this.form);
            // this.$router.push({name:'forum'})
            // new User.test(this.form.email); 
        }
    }
}
</script>
<style>

</style>
