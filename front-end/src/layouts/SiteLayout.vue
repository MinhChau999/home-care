<template>
  <div class="site-layout">
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark topnav">
      <div class="container">
        <!-- logo -->
        <a href="index.html" class="navbar-brand mr-lg-5">
          <img
            src="../assets/images/logo.png"
            alt=""
            class="logo-dark"
            height="12"
          />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div
          class="collapse navbar-collapse navbar-font"
          id="navbarNavDropdown"
        >
          <!-- left menu -->
          <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item mx-lg-1">
              <a class="nav-link active" href="">Home</a>
            </li>
            <li class="nav-item mx-lg-1">
              <a class="nav-link" href="">Features</a>
            </li>
            <li class="nav-item mx-lg-1">
              <a class="nav-link" href="">Pricing</a>
            </li>
            <li class="nav-item mx-lg-1">
              <a class="nav-link" href="">FAQs</a>
            </li>
            <li class="nav-item mx-lg-1">
              <a class="nav-link" href="">Clients</a>
            </li>
            <li class="nav-item mx-lg-1">
              <a class="nav-link" href="">Contact</a>
            </li>
          </ul>

          <!-- right menu -->
          <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item mr-0">
              <a
                href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                target="_blank"
                class="nav-link d-lg-none"
                >Purchase now</a
              >
              <a
                href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                target="_blank"
                class="btn btn-sm btn-light btn-rounded d-none d-lg-inline-flex"
              >
                <i class="mdi mdi-basket mr-2"></i> Purchase Now
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR END -->
    <slot />

    <!-- START FOOTER -->
    <footer class="bg-dark py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img
              src="../assets/images/logo.png"
              alt=""
              class="logo-dark"
              height="18"
            />
            <p class="text-white-50 mt-4">
              Hyper makes it easier to build better websites with <br />
              great speed. Save hundreds of hours of design <br />
              and development by using it.
            </p>

            <ul class="social-list list-inline mt-3">
              <li class="list-inline-item text-center">
                <a
                  href="javascript: void(0);"
                  class="social-list-item border-primary text-primary"
                  ><i class="mdi mdi-facebook"></i
                ></a>
              </li>
              <li class="list-inline-item text-center">
                <a
                  href="javascript: void(0);"
                  class="social-list-item border-danger text-danger"
                  ><i class="mdi mdi-google"></i
                ></a>
              </li>
              <li class="list-inline-item text-center">
                <a
                  href="javascript: void(0);"
                  class="social-list-item border-info text-info"
                  ><i class="mdi mdi-twitter"></i
                ></a>
              </li>
              <li class="list-inline-item text-center">
                <a
                  href="javascript: void(0);"
                  class="social-list-item border-secondary text-secondary"
                  ><i class="mdi mdi-github-circle"></i
                ></a>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 mt-3 mt-lg-0">
            <h5 class="text-white">Company</h5>

            <ul class="list-unstyled pl-0 mb-0 mt-3">
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >About Us</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Documentation</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50">Blog</a>
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Affiliate Program</a
                >
              </li>
            </ul>
          </div>

          <div class="col-lg-2 mt-3 mt-lg-0">
            <h5 class="text-white">Apps</h5>

            <ul class="list-unstyled pl-0 mb-0 mt-3">
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Ecommerce Pages</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50">Email</a>
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Social Feed</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Projects</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Tasks Management</a
                >
              </li>
            </ul>
          </div>

          <div class="col-lg-2 mt-3 mt-lg-0">
            <h5 class="text-white">Discover</h5>

            <ul class="list-unstyled pl-0 mb-0 mt-3">
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Help Center</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50"
                  >Our Products</a
                >
              </li>
              <li class="mt-2">
                <a href="javascript: void(0);" class="text-white-50">Privacy</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="mt-5">
              <p class="text-white-50 mt-4 text-center mb-0">
                © 2018 - 2020 Hyper. Design and coded by Coderthemes
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- END FOOTER -->
  </div>
</template>

<script>
export default {};
</script>
