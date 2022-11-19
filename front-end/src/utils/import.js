import { defineAsyncComponent } from 'vue';

export function registerGlobalComponent(app)
{
   app.component(
      'auth-layout',
      defineAsyncComponent(() => import('@/layouts/AuthLayout'))
   ),
   app.component(
      'default-layout',
      defineAsyncComponent(() => import('@/layouts/DefaultLayout'))
   )
   app.component(
      'admin-layout',
      defineAsyncComponent(() => import('@/layouts/AdminLayout'))
   )
   app.component(
      'site-layout',
      defineAsyncComponent(() => import('@/layouts/SiteLayout'))
   )
}