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
  // Dashboard
  {
    path: "/admin",
    component: () => import("@/views/admin/DashBoard.vue"),
    name: "dashboard",
    meta: {
      layout: "admin",
    },
  },

  /**
   * User routes
   */
  // user Management
  {
    path: "/admin/users",
    component: () => import("@/views/admin/user/UserManage.vue"),
    name: "user-manager",
    meta: {
      layout: "admin",
    },
  },
  // profile User
  {
    path: "/admin/profile",
    component: () => import("@/views/admin/ProfileAdmin.vue"),
    name: "profile-admin",
    meta: {
      layout: "admin",
    },
  },
  // profile User with ID
  {
    path: "/admin/user/:id",
    component: () => import("@/views/admin/ProfileAdmin.vue"),
    name: "edit-userid",
    meta: {
      layout: "admin",
    },
  },
  // support for user
  {
    path: "/admin/support",
    component: () => import("@/views/admin/SupportFAQ.vue"),
    name: "support-admin",
    meta: {
      layout: "admin",
    },
  },
  // edit profile
  {
    path: "/admin/profile/edit",
    component: () => import("@/views/admin/EditProfileAdmin.vue"),
    name: "edit-profile-admin",
    meta: {
      layout: "admin",
    },
  },
  // user Create
  {
    path: "/admin/users/create",
    component: () => import("@/views/admin/CreateUserAdmin.vue"),
    name: "user-create",
    meta: {
      layout: "admin",
    },
  },
  /**
   * doctor routes
   */
  // doctor Management
  {
    path: "/admin/doctors",
    component: () => import("@/views/admin/doctor/DoctorManage.vue"),
    name: "doctor-manager",
    meta: {
      layout: "admin",
    },
  },

  /**
   * Patient routes
   */
  // patient Management
  {
    path: "/admin/patients",
    component: () => import("@/views/admin/patient/PatientManage.vue"),
    name: "patient-manager",
    meta: {
      layout: "admin",
    },
  },

  /**
   * clinic routes
   */
  // clinic Management
  {
    path: "/admin/clinics",
    component: () => import("@/views/admin/clinic/ClinicManage.vue"),
    name: "clinic-manager",
    meta: {
      layout: "admin",
    },
  },

  /**
   * Booking routes
   */
  // booking home management
  {
    path: "/admin/booking-home",
    component: () => import("@/views/admin/booking/BookingHomeManage.vue"),
    name: "booking-home-manager",
    meta: {
      layout: "admin",
    },
  },

  // booking check out
  {
    path: "/admin/booking-home/checkout",
    component: () => import("@/views/admin/booking/BookingHomeCheckout.vue"),
    name: "booking-home-checkout",
    meta: {
      layout: "admin",
    },
  },

  // booking home details page
  {
    path: "/admin/booking-home/:id",
    component: () => import("@/views/admin/booking/BookingHomeDetail.vue"),
    name: "booking-home-detail",
    meta: {
      layout: "admin",
    },
  },

  // booking home management
  {
    path: "/admin/booking-clinic",
    component: () => import("@/views/admin/booking/BookingClinicManage.vue"),
    name: "booking-clinic-manager",
    meta: {
      layout: "admin",
    },
  },

  /**
   * Auth
   */
  //Login
  {
    path: "/admin/login",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/AdminLogin.vue"),
    name: "admin-login",
  },
  //Fogot Password
  {
    path: "/admin/fogot-password",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/AdminFogotPassword.vue"),
    name: "admin-fogot",
  },
  //Reset Password
  {
    path: "/admin/reset-password",
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/AdminResetPassword.vue"),
    name: "admin-reset-password",
  },
  // Confirm Password Reset
  {
    path: "/admin/page-confirm-password/:email",
    props: true,
    meta: {
      layout: "auth",
    },
    component: () => import("@/views/auth/PageConfirmMail.vue"),
    name: "page-confirm-password",
  },
  // Page Success Password
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
