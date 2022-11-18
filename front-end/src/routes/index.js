import { createRouter, createWebHistory } from 'vue-router';

import AboutPage from '../views/AboutPage.vue';
import HomePage from '../views/HomePage.vue';

const routes = [
   { 
      path: '/', 
      component: HomePage,
      name: 'home-page' 
   },
   { 
      path: '/about', 
      component: AboutPage, 
      meta: {
         layout: "auth",
      },
      name: 'about-page' 
   },

]

const router = createRouter({
   history: createWebHistory(process.env.BASE_URL),
   routes, // short for `routes: routes`
 });

export default router;