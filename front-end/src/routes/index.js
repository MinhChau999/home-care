import { createRouter, createWebHistory } from "vue-router";

const routes = [
  // User routes
  {
    path: "/",
    component: () =>
      import(/* webpackChunkName: "landing" */ "../views/site/LandingPage.vue"),
    name: "landing-page",
  },
  {
    path: "/test",
    component: () =>
      import("../views/HomePage.vue"),
    name: "home-page",
    meta: {
      layout: "site",
    },
  },
  {
    path: "/login",
    meta: {
      layout: "auth",
    },
    component: () =>
      import(
        /* webpackChunkName: "user-login" */ "../views/auth/CustomerLogin.vue"
      ),
    name: "user-login",
  },
  {
    path: "/register",
    meta: {
      layout: "auth",
    },
    component: () =>
      import(
        /* webpackChunkName: "user-login" */ "../views/auth/CustomerRegister.vue"
      ),
    name: "user-register",
  },

  // Admin routes
  /**
   * Dashboard routes
   */
  {
    path: "/admin",
    component: () =>
      import(/* webpackChunkName: "dashboard" */ "../views/admin/DashBoard.vue"),
    name: "dashboard",
    meta: {
      layout: "admin",
    },
  },

  /**
   * Auth
   */
  {
    path: "/admin/login",
    meta: {
      layout: "auth",
    },
    component: () =>
      import(
        /* webpackChunkName: "user-login" */ "../views/auth/AdminLogin.vue"
      ),
    name: "admin-login",
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes, // short for `routes: routes`
});

export default router;
