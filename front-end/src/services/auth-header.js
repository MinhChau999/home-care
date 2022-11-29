export default function authHeader(role = ""){
   let user = JSON.parse(localStorage.getItem('token' + role));
   if(user && user.token){
      return { Authorization: 'Bearer ' + user.token };
   }
   return {};
}