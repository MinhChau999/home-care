import { defineAsyncComponent } from "vue";

export function registerGlobalComponent(app: any) {
  app.component(
    "auth-layout",
    defineAsyncComponent(() => import("@/layouts/AuthLayout.vue"))
  ),
    app.component(
      "default-layout",
      defineAsyncComponent(() => import("@/layouts/DefaultLayout.vue"))
    );
  app.component(
    "admin-layout",
    defineAsyncComponent(() => import("@/layouts/AdminLayout.vue"))
  );
  app.component(
    "site-layout",
    defineAsyncComponent(() => import("@/layouts/SiteLayout.vue"))
  );
}
