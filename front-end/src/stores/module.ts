import AuthService from "@/services/auth.service";

let user = null;
let admin = null;

try {
  user = JSON.parse(localStorage.getItem("token") || "");
} catch (e) {
  console.error("Error parsing user JSON:", e);
}

try {
  admin = JSON.parse(localStorage.getItem("tokenadmin") || "");
} catch (e) {
  console.error("Error parsing admin JSON:", e);
}

const initialStateUser =
  user && user.token != null
    ? { status: { loggedIn: true }, user }
    : { status: { loggedIn: false }, user: null };

const initialStateAdmin =
  admin && admin.token != null
    ? { status: { loggedIn: true }, admin }
    : { status: { loggedIn: false }, admin: null };

export const authUser = {
  namespaced: true,
  state: initialStateUser,
  actions: {
    login({ commit }: any, user: any) {
      return AuthService.loginUser(user).then(
        (user) => {
          commit("loginSuccess", user.data);
          return Promise.resolve(user.data);
        },
        (error) => {
          commit("loginFailure");
          return Promise.reject(error);
        }
      );
    },
    logout({ commit }: any): void {
      AuthService.logoutUser();
      commit("logout");
    },
    register({ commit }: any, user: any) {
      return AuthService.registerUser(user).then(
        (user) => {
          commit("registerSuccess", user.data);
          return Promise.resolve(user.data);
        },
        (error) => {
          commit("registerFailure");
          return Promise.reject(error);
        }
      );
    },
  },
  mutations: {
    loginSuccess(
      state: { status: { loggedIn: boolean }; user: any },
      user: any
    ) {
      state.status.loggedIn = true;
      state.user = user.data;
    },
    loginFailure(state: { status: { loggedIn: boolean }; user: null }) {
      state.status.loggedIn = false;
      state.user = null;
    },
    logout(state: { status: { loggedIn: boolean }; user: null }) {
      state.status.loggedIn = false;
      state.user = null;
    },
    registerSuccess(
      state: { status: { loggedIn: boolean }; user: any },
      user: any
    ) {
      state.status.loggedIn = true;
      state.user = user.data;
    },
    registerFailure(state: { status: { loggedIn: boolean } }) {
      state.status.loggedIn = false;
    },
  },
};

export const authAdmin = {
  namespaced: true,
  state: initialStateAdmin,
  actions: {
    login({ commit }: any, admin: any) {
      return AuthService.loginAdmin(admin).then(
        (admin) => {
          commit("loginSuccess", admin.data);
          return Promise.resolve(admin.data);
        },
        (error) => {
          commit("loginFailure");
          return Promise.reject(error);
        }
      );
    },
    logout({ commit }: any) {
      AuthService.logoutAdmin();
      commit("logout");
    },
  },
  mutations: {
    loginSuccess(
      state: { status: { loggedIn: boolean }; admin: any },
      admin: any
    ) {
      state.status.loggedIn = true;
      state.admin = admin.data;
    },
    loginFailure(state: { status: { loggedIn: boolean }; admin: null }) {
      state.status.loggedIn = false;
      state.admin = null;
    },
    logout(state: { status: { loggedIn: boolean }; admin: null }) {
      state.status.loggedIn = false;
      state.admin = null;
    },
  },
};
