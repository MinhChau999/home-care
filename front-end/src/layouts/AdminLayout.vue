<template>
  <div class="wrapper mm-active" :class="{ 'sidebar-enable': enableSidebar }">
    <!-- sidebar-enable -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu mm-show">
      <!-- LOGO -->
      <div class="logo text-center">
        <router-link :to="{ name: 'dashboard' }">
          <img src="@/assets/images/logo.png" style="height: 16px" />
        </router-link>
      </div>
      <div
        class="h-100 mm-active"
        id="left-side-menu-container"
        data-simplebar="init"
        @click="enableSidebar = false"
      >
        <div class="simplebar-wrapper" style="margin: 0px">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px">
              <div
                class="simplebar-content-wrapper"
                style="height: 100%; overflow: hidden scroll"
              >
                <div class="simplebar-content" style="padding: 0px">
                  <!--- Sidemenu -->
                  <ul class="metismenu side-nav mm-show">
                    <li class="side-nav-title side-nav-item">Navigation</li>
                    <!-- Dashboard -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                      </router-link>
                    </li>
                    <!-- Users -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'user-manager' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="uil-users-alt"></i>
                        <span> Users </span>
                      </router-link>
                    </li>
                    <!-- Doctors -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="mdi mdi-doctor"></i>
                        <span> Doctors </span>
                      </router-link>
                    </li>
                    <!-- Patient -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="uil-user-plus"></i>
                        <span> Patients </span>
                      </router-link>
                    </li>

                    <!-- Schedules -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="mdi mdi-calendar-weekend-outline"></i>
                        <span> Schedules </span>
                      </router-link>
                    </li>
                    <!-- Schedules -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="mdi mdi-calendar-check-outline"></i>
                        <span> Shifts </span>
                      </router-link>
                    </li>
                    <!-- Booking -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="mdi mdi-checkbox-multiple-marked-outline"></i>
                        <span> Bookings </span>
                      </router-link>
                    </li>

                    <!-- Medical Services-->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="uil-medical-drip"></i>
                        <span> Medical Services </span>
                      </router-link>
                    </li>

                    <!-- Medical Products -->
                    <li class="side-nav-item">
                      <router-link
                        :to="{ name: 'dashboard' }"
                        class="side-nav-link"
                        aria-expanded="true"
                        @click="enableSidebar = false"
                      >
                        <i class="uil-capsule"></i>
                        <span> Medical Products </span>
                      </router-link>
                    </li>
                    <!--  -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div
            class="simplebar-placeholder"
            style="width: auto; height: 1581px"
          ></div>
        </div>
        <div
          class="simplebar-track simplebar-horizontal"
          style="visibility: hidden"
        >
          <div
            class="simplebar-scrollbar"
            style="width: 0px; display: none"
          ></div>
        </div>
        <div
          class="simplebar-track simplebar-vertical"
          style="visibility: visible"
        >
          <div class="simplebar-scrollbar"></div>
        </div>
      </div>
      <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom">
          <ul
            class="list-unstyled topbar-right-menu float-right mb-0"
            v-click-outside="onClickOutside"
          >
            <li
              class="dropdown notification-list d-lg-none"
              :class="{
                show: dropdownSearch,
              }"
            >
              <a
                class="nav-link dropdown-toggle arrow-none"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                :aria-expanded="dropdownSearch"
                v-on:click="
                  (dropdownSearch = !dropdownSearch),
                    (dropdownProfile = false),
                    (dropdownNotification = false)
                "
              >
                <i class="dripicons-search noti-icon"></i>
              </a>
              <div
                class="dropdown-menu dropdown-menu-animated dropdown-lg p-0"
                :class="{
                  show: dropdownSearch,
                }"
              >
                <form class="p-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search ..."
                    aria-label="Recipient's username"
                  />
                </form>
              </div>
            </li>

            <!-- start notification  -->
            <li
              class="dropdown notification-list"
              :class="{
                show: dropdownNotification,
              }"
            >
              <a
                class="nav-link dropdown-toggle arrow-none"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                :aria-expanded="dropdownNotification"
                v-on:click="
                  (dropdownNotification = !dropdownNotification),
                    (dropdownProfile = false),
                    (dropdownSearch = false)
                "
              >
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg"
                x-placement="bottom-end"
                :class="{
                  show: dropdownNotification,
                }"
              >
                <!-- item-->
                <div class="dropdown-item noti-title">
                  <h5 class="m-0">
                    <span class="float-right">
                      <a href="javascript: void(0);" class="text-dark">
                        <small>Clear All</small>
                      </a> </span
                    >Notification
                  </h5>
                </div>

                <div style="max-height: 230px" data-simplebar="init">
                  <div class="simplebar-wrapper" style="margin: 0px">
                    <div class="simplebar-height-auto-observer-wrapper">
                      <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                      <div
                        class="simplebar-offset"
                        style="right: 0px; bottom: 0px"
                      >
                        <div
                          class="simplebar-content-wrapper"
                          style="height: auto; overflow: hidden"
                        >
                          <div class="simplebar-content" style="padding: 0px">
                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                              </div>
                              <p class="notify-details">
                                Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                              </p>
                            </a>

                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                              </div>
                              <p class="notify-details">
                                New user registered.
                                <small class="text-muted">5 hours ago</small>
                              </p>
                            </a>

                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon">
                                <img
                                  src="@/assets/images/users/avatar-2.jpg"
                                  class="img-fluid rounded-circle"
                                  alt=""
                                />
                              </div>
                              <p class="notify-details">Cristina Pride</p>
                              <p class="text-muted mb-0 user-msg">
                                <small
                                  >Hi, How are you? What about our next
                                  meeting</small
                                >
                              </p>
                            </a>

                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                              </div>
                              <p class="notify-details">
                                Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                              </p>
                            </a>

                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon">
                                <img
                                  src="@/assets/images/users/avatar-4.jpg"
                                  class="img-fluid rounded-circle"
                                  alt=""
                                />
                              </div>
                              <p class="notify-details">Karen Robinson</p>
                              <p class="text-muted mb-0 user-msg">
                                <small
                                  >Wow ! this admin looks good and awesome
                                  design</small
                                >
                              </p>
                            </a>

                            <!-- item-->
                            <a
                              href="javascript:void(0);"
                              class="dropdown-item notify-item"
                            >
                              <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                              </div>
                              <p class="notify-details">
                                Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                              </p>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="simplebar-placeholder"
                      style="width: 0px; height: 0px"
                    ></div>
                  </div>
                  <div
                    class="simplebar-track simplebar-horizontal"
                    style="visibility: hidden"
                  >
                    <div
                      class="simplebar-scrollbar"
                      style="width: 0px; display: none"
                    ></div>
                  </div>
                  <div
                    class="simplebar-track simplebar-vertical"
                    style="visibility: hidden"
                  >
                    <div
                      class="simplebar-scrollbar"
                      style="height: 0px; display: none"
                    ></div>
                  </div>
                </div>

                <!-- All-->
                <a
                  href="javascript:void(0);"
                  class="dropdown-item text-center text-primary notify-item notify-all"
                >
                  View All
                </a>
              </div>
            </li>
            <!-- end notification -->

            <!-- start user -->
            <li
              class="dropdown notification-list"
              :class="{
                show: dropdownProfile,
              }"
            >
              <a
                class="nav-link dropdown-toggle nav-user arrow-none mr-0"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                :aria-expanded="dropdownProfile"
                v-on:click="
                  (dropdownProfile = !dropdownProfile),
                    (dropdownNotification = false),
                    (dropdownSearch = false)
                "
              >
                <span class="account-user-avatar">
                  <img
                    src="@/assets/images/users/avatar-1.jpg"
                    alt="user-image"
                    class="rounded-circle"
                  />
                </span>
                <span>
                  <span class="account-user-name">Dominic Keller</span>
                  <span class="account-position">Founder</span>
                </span>
              </a>
              <!-- <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
              > -->
              <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                :class="{
                  show: dropdownProfile,
                }"
              >
                <!-- item-->
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <router-link
                  :to="{ name: 'profile-admin' }"
                  class="dropdown-item notify-item"
                  v-on:click="hideDropdown"
                >
                  <i class="mdi mdi-account-circle mr-1"></i>
                  <span>My Account</span>
                </router-link>

                <!-- item-->
                <router-link
                  :to="{ name: 'edit-profile-admin' }"
                  class="dropdown-item notify-item"
                  v-on:click="hideDropdown"
                >
                  <i class="mdi mdi-account-edit mr-1"></i>
                  <span>Edit</span>
                </router-link>

                <!-- item-->
                <router-link
                  :to="{ name: 'support-admin' }"
                  class="dropdown-item notify-item"
                  v-on:click="hideDropdown"
                >
                  <i class="mdi mdi-lifebuoy mr-1"></i>
                  <span>Support</span>
                </router-link>
                <!-- item-->
                <a
                  href="javascript:void(0);"
                  class="dropdown-item notify-item"
                  v-on:click="logout"
                >
                  <i class="mdi mdi-logout mr-1"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
            <!-- end user  -->
          </ul>
          <button
            class="button-menu-mobile open-left disable-btn"
            v-on:click="enableSidebar = !enableSidebar"
          >
            <i class="mdi mdi-menu"></i>
          </button>
          <div class="app-search dropdown d-none d-lg-block">
            <form>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control dropdown-toggle"
                  placeholder="Search..."
                  id="top-search"
                />
                <span class="mdi mdi-magnify search-icon"></span>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Search</button>
                </div>
              </div>
            </form>

            <div
              class="dropdown-menu dropdown-menu-animated dropdown-lg"
              id="search-dropdown"
            >
              <!-- item-->
              <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">
                  Found <span class="text-danger">17</span> results
                </h5>
              </div>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 mr-1"></i>
                <span>Analytics Report</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 mr-1"></i>
                <span>How can I help you?</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 mr-1"></i>
                <span>User profile settings</span>
              </a>

              <!-- item-->
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
              </div>

              <div class="notification-list">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="media">
                    <img
                      class="d-flex mr-2 rounded-circle"
                      src="@/assets/images/users/avatar-2.jpg"
                      alt="Generic placeholder image"
                      height="32"
                    />
                    <div class="media-body">
                      <h5 class="m-0 font-14">Erwin Brown</h5>
                      <span class="font-12 mb-0">UI Designer</span>
                    </div>
                  </div>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="media">
                    <img
                      class="d-flex mr-2 rounded-circle"
                      src="@/assets/images/users/avatar-5.jpg"
                      alt="Generic placeholder image"
                      height="32"
                    />
                    <div class="media-body">
                      <h5 class="m-0 font-14">Jacob Deo</h5>
                      <span class="font-12 mb-0">Developer</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start content -->
          <slot />
          <!-- end content -->

          <!-- end row -->
        </div>
        <!-- container -->
      </div>
      <!-- content -->

      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">Home Care 2022</div>
            <div class="col-md-6">
              <div class="text-md-right footer-links d-none d-md-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
</template>

<script>
import vClickOutside from "click-outside-vue3";

export default {
  directives: {
    clickOutside: vClickOutside.directive,
  },

  computed: {
    loggedIn() {
      return this.$store.state.authAdmin.status.loggedIn;
    },
  },

  mounted() {
    if (!this.loggedIn) {
      this.$router.push({ name: "admin-login" });
    }
  },

  data() {
    return {
      dropdownProfile: false,
      dropdownNotification: false,
      dropdownSearch: false,
      enableSidebar: false,
    };
  },

  methods: {
    onClickOutside() {
      if (this.dropdownProfile == true) {
        this.dropdownProfile = false;
      }
      if (this.dropdownNotification == true) {
        this.dropdownNotification = false;
      }
      if (this.dropdownSearch == true) {
        this.dropdownSearch = false;
      }
    },
    hideDropdown() {
      if (this.dropdownProfile == true) {
        this.dropdownProfile = false;
      }
    },
    logout() {
      this.$store.dispatch("authAdmin/logout");
      this.$router.push({ name: "admin-login" });
    },
  },
};
</script>
