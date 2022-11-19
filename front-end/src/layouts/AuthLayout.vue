<template>
  <div class="auth authentication-bg pb-0">
    <div class="auth-fluid">
      <!--Auth fluid left content -->
      <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
          <!-- start card-body -->
          <slot />
          <!-- end .card-body -->
        </div>
        <!-- end .align-items-center.d-flex.h-100-->
      </div>
      <!-- end auth-fluid-form-box-->

      <!-- Auth fluid right content -->
      <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
          <h2 class="mb-3">I love the color!</h2>
          <p class="lead">
            <i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I
            love it very much! . <i class="mdi mdi-format-quote-close"></i>
          </p>
          <p>- Hyper Admin User</p>
        </div>
        <!-- end auth-user-testimonial-->
      </div>
      <!-- end Auth fluid right content -->
    </div>
  </div>
</template>
