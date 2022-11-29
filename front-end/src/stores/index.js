import { createStore } from "vuex";
import { authAdmin, authUser } from "./auth.module";

const store = createStore({
  modules: {
    authUser,
    authAdmin,
  },
});

export default store;