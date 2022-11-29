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
    path: "/booking",
    component: () => import("../views/site/BookingPage.vue"),
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
      import(
        /* webpackChunkName: "dashboard" */ "../views/admin/DashBoard.vue"
      ),
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
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: () =>
      import("../views/PageNotFound.vue"),
  },
  // { path: '/admin/:afterAdmin(.*)', component: UserGeneric },
];

// Handle Unauthorized Access
// router.beforeEach((to, from, next) => {
//   const publicPages = ['/login', '/register', '/home'];
//   const authRequired = !publicPages.includes(to.path);
//   const loggedIn = localStorage.getItem('token');

//   // trying to access a restricted page + not logged in
//   // redirect to login page
//   if (authRequired && !loggedIn) {
//     next('/login');
//   } else {
//     next();
//   }
// });

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes, // short for `routes: routes`
});

export default router;
