import { createStore } from "vuex";
import { authAdmin, authUser } from "./module";

export default createStore({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    authUser,
    authAdmin,
  },
});
