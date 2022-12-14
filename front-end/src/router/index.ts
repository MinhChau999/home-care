import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";

const routes: Array<RouteRecordRaw> = [
  // User routes
  {
    path: "/",
    component: () => import("@/views/site/LandingPage.vue"),
    name: "landing-page",
  },
  {
    path: "/test",
    component: () => import("@/views/HomePage.vue"),
    name: "test",
    meta: {
      layout: "admin",
    },
  },
  {
    path: "/booking",
    component: () => import("@/views/site/BookingPage.vue"),
    name: "home-page",
    meta: { layout: "site" },
  },
  {
    path: "/login",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/CustomerLogin.vue"),
    name: "user-login",
  },

  {
    path: "/register",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/CustomerRegister.vue"),
    name: "user-register",
  },

  // Admin routes
  /**
   * Dashboard routes
   */
  {
    path: "/admin",
    component: () => import("@/views/admin/DashBoard.vue"),
    name: "dashboard",
    meta: {
      layout: "admin",
    },
  },

  /**
   * Profile admin routes
   */
  {
    path: "/admin/profile",
    component: () => import("@/views/admin/ProfileAdmin.vue"),
    name: "profile-admin",
    meta: {
      layout: "admin",
    },
  },
  /**
   * Profile admin routes
   */
  {
    path: "/admin/support",
    component: () => import("@/views/admin/SupportFAQ.vue"),
    name: "support-admin",
    meta: {
      layout: "admin",
    },
  },
  /**
   * Edit profile admin routes
   */
  {
    path: "/admin/profile/edit",
    component: () => import("@/views/admin/EditProfileAdmin.vue"),
    name: "edit-profile-admin",
    meta: {
      layout: "admin",
    },
  },
  /**
   * Edit profile admin routes
   */
  {
    path: "/admin/user-manager",
    component: () => import("@/views/admin/UserManage.vue"),
    name: "user-manager",
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
    component: () => import("@/views/auth/AdminLogin.vue"),
    name: "admin-login",
  },
  {
    path: "/admin/fogot-password",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/AdminFogotPassword.vue"),
    name: "admin-fogot",
  },
  {
    path: "/admin/reset-password",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/AdminResetPassword.vue"),
    name: "admin-reset-password",
  },
  {
    path: "/admin/page-confirm-password/:email",
    props: true,
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/PageConfirmMail.vue"),
    name: "page-confirm-password",
  },
  {
    path: "/admin/page-success-password",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/ChangePassSuccess.vue"),
    name: "page-success-password",
  },

  /**
   * Error PageNotFound
   */
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: () => import("@/views/PageNotFound.vue"),
  },
  // { path: '/admin/:afterAdmin(.*)', component: UserGeneric },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
