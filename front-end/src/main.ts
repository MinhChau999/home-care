import FloatingVue from "floating-vue";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./stores";
import { registerGlobalComponent } from "./utils/import";

import "./assets/styles/icons.css";

import "./assets/styles/global.css";

import "floating-vue/dist/style.css";

import Vue3EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";

const app = createApp(App);
registerGlobalComponent(app);
app.component("EasyDataTable", Vue3EasyDataTable);
app.use(FloatingVue);
app.use(store);
app.use(router);
app.mount("#app");
