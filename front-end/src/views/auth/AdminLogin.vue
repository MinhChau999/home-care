<template>
  <div class="card-body">
    <!-- Logo -->
    <div class="auth-brand text-center text-lg-left">
      <a href="index.html" class="logo-light">
        <span><img src="assets/images/logo.png" alt="" height="18" /></span>
      </a>
    </div>

    <!-- title-->
    <h4 class="mt-0">Sign In for Admin</h4>
    <p class="text-muted mb-4">
      Enter your email address and password to access account.
    </p>

    <!-- form -->
    <form action="#">
      <div class="form-group">
        <label for="emailaddress">Email address</label>
        <input
          class="form-control"
          type="email"
          id="emailaddress"
          required=""
          placeholder="Enter your email"
        />
      </div>
      <div class="form-group">
        <a href="pages-recoverpw-2.html" class="text-muted float-right"
          ><small>Forgot your password?</small></a
        >
        <label for="password">Password</label>
        <input
          class="form-control"
          type="password"
          required=""
          id="password"
          placeholder="Enter your password"
        />
      </div>
      <div class="form-group mb-3">
        <div class="custom-control custom-checkbox">
          <input
            type="checkbox"
            class="custom-control-input"
            id="checkbox-signin"
          />
          <label class="custom-control-label" for="checkbox-signin"
            >Remember me</label
          >
        </div>
      </div>
      <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
          <i class="mdi mdi-login"></i> Log In
        </button>
      </div>
      <!-- social-->
      <div class="text-center mt-4">
        <p class="text-muted font-16">Sign in with</p>
        <ul class="social-list list-inline mt-3">
          <li class="list-inline-item">
            <a
              href="javascript: void(0);"
              class="social-list-item border-primary text-primary"
              ><i class="mdi mdi-facebook"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a
              href="javascript: void(0);"
              class="social-list-item border-danger text-danger"
              ><i class="mdi mdi-google"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a
              href="javascript: void(0);"
              class="social-list-item border-info text-info"
              ><i class="mdi mdi-twitter"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a
              href="javascript: void(0);"
              class="social-list-item border-secondary text-secondary"
              ><i class="mdi mdi-github-circle"></i
            ></a>
          </li>
        </ul>
      </div>
    </form>
    <!-- end form-->

  </div>
  <!-- end .card-body -->
</template>

<script>
export default {};
</script>
