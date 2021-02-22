 class User{
     login(form) {
        axios.post('/api/user/login',form).then(res => console.log(res)).catch(err => console.log(err))
    }
}
 export default User = new User();
