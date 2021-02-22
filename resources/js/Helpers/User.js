import AppStorage from "./AppStorage";
class User{
     login(form) {
        axios.post('/api/user/login',form).then(res => this.responseAfterLogin(res)).catch(err => console.log(err))
    }
    responseAfterLogin(res){
        const token = res.data.token
        const user = res.data.email
        AppStorage.store(user,token)
    }
    hasToken(token){
         if (AppStorage.getToken() === token){
             return true;
         }
         return false;
    }
    loggedIn(){
         return this.hasToken();
    }
    logout(){
         AppStorage.clear();
    }
}
 export default User = new User();
