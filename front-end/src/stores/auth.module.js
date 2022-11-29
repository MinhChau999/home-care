import AuthService from "@/services/auth.service";

const user = JSON.parse(localStorage.getItem('token'));
const admin = JSON.parse(localStorage.getItem('tokenadmin'));
const initialStateUser = user
   ? { status: { loggedIn: true}, user}
   : { status: { loggedIn: false}, user: null };

const initialStateAdmin = admin
   ? { status: { loggedIn: true}, admin}
   : { status: { loggedIn: false}, admin: null };

export const authUser = {
   namespaced: true,
   state: initialStateUser,
   actions: {
      login({commit}, user) {
         return AuthService.loginUser(user).then(
            user => {
               commit('loginSuccess', user);
               return Promise.resolve(user);
            },
            error => {
               commit('loginFailure');
               return Promise.reject(error);
            }
         );
      },
      logout({commit}){
         AuthService.logoutUser();
         commit('logout');
      },
      register({commit}, user){
         return AuthService.registerUser(user).then(
            user => {
               commit('registerSuccess');
               return Promise.resolve(user);
            },
            error => {
               commit('registerFailure');
               return Promise.reject(error);
            }
         );
      },
   },
   mutations: {
      loginSuccess(state, user){
         state.status.loggedIn = true;
         state.user = user;
      },
      loginFailure(state){
         state.status.loggedIn = false;
         state.user = null;
      },
      logout(state){
         state.status.loggedIn = false;
         state.user = null;
      },
      resgisterSuccess(state){
         state.status.loggedIn = true;
      },
      resgisterFailure(state){
         state.status.loggedIn = false;
      }
   }
};

export const authAdmin = {
   namespaced: true,
   state: initialStateAdmin,
   actions: {
      login({commit}, admin) {
         return AuthService.loginAdmin(admin).then(
            admin => {
               commit('loginSuccess', admin);
               return Promise.resolve(admin);
            },
            error => {
               commit('loginFailure');
               return Promise.reject(error);
            }
         );
      },
      logout({commit}){
         AuthService.logoutAdmin();
         commit('logout');
      },
   },
   mutations: {
      loginSuccess(state, admin){
         state.status.loggedIn = true;
         state.user = admin;
      },
      loginFailure(state){
         state.status.loggedIn = false;
         state.admin = null;
      },
      logout(state){
         state.status.loggedIn = false;
         state.admin = null;
      },
   }
}