<template>
  <div class="user-profile">
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">Hyper</a>
              </li>
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">eCommerce</a>
              </li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
          <h4 class="page-title text-first-uppercase">{{ title }}</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
          <div class="card-body">
            <img
              v-if="!user.avatar"
              src="@/assets/images/users/avatar-1.jpg"
              class="rounded-circle avatar-lg img-thumbnail"
            />
            <img
              v-else
              :src="user.avatar"
              class="rounded-circle avatar-lg img-thumbnail"
            />

            <h4 class="mb-0 mt-2">{{ user.name }}</h4>
            <p class="text-muted font-14">{{ user.roleName }}</p>

            <div class="form-group mb-0 mt-2 text-center">
              <div
                :class="{ 'spinner-border text-primary': loadingUser }"
                role="status"
              ></div>
            </div>

            <div class="text-left mt-3">
              <h4 class="font-13 text-uppercase">About Me :</h4>
              <p class="text-muted mb-2 font-13">
                <strong>Full Name :</strong>
                <span class="ml-2">{{ user.name }}</span>
              </p>

              <p class="text-muted mb-2 font-13">
                <strong>Mobile :</strong
                ><span class="ml-2">{{ user.phone }}</span>
              </p>

              <p class="text-muted mb-2 font-13">
                <strong>Email :</strong>
                <span class="ml-2">{{ user.email }}</span>
              </p>

              <p class="text-muted mb-1 font-13">
                <strong>Address :</strong>
                <span class="ml-2">{{ user.address }}</span>
              </p>
            </div>

            <ul class="social-list list-inline mt-3 mb-0">
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
          <!-- end card-body -->
        </div>
        <!-- end card -->

        <!-- Notification-->
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-3">Notification</h4>

            <div class="inbox-widget">
              <div class="inbox-item">
                <div class="inbox-item-img">
                  <img
                    src="@/assets/images/users/avatar-2.jpg"
                    class="rounded-circle"
                  />
                </div>
                <p class="inbox-item-author">Tomaslau</p>
                <p class="inbox-item-text">I've finished it! See you so...</p>
                <p class="inbox-item-date">
                  <a href="#" class="btn btn-sm btn-link text-info font-13">
                    Reply
                  </a>
                </p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img">
                  <img
                    src="@/assets/images/users/avatar-3.jpg"
                    class="rounded-circle"
                    alt=""
                  />
                </div>
                <p class="inbox-item-author">Stillnotdavid</p>
                <p class="inbox-item-text">This theme is awesome!</p>
                <p class="inbox-item-date">
                  <a href="#" class="btn btn-sm btn-link text-info font-13">
                    Reply
                  </a>
                </p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img">
                  <img
                    src="@/assets/images/users/avatar-4.jpg"
                    class="rounded-circle"
                    alt=""
                  />
                </div>
                <p class="inbox-item-author">Kurafire</p>
                <p class="inbox-item-text">Nice to meet you</p>
                <p class="inbox-item-date">
                  <a href="#" class="btn btn-sm btn-link text-info font-13">
                    Reply
                  </a>
                </p>
              </div>

              <div class="inbox-item">
                <div class="inbox-item-img">
                  <img
                    src="@/assets/images/users/avatar-5.jpg"
                    class="rounded-circle"
                    alt=""
                  />
                </div>
                <p class="inbox-item-author">Shahedk</p>
                <p class="inbox-item-text">Hey! there I'm available...</p>
                <p class="inbox-item-date">
                  <a href="#" class="btn btn-sm btn-link text-info font-13">
                    Reply
                  </a>
                </p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img">
                  <img
                    src="@/assets/images/users/avatar-6.jpg"
                    class="rounded-circle"
                    alt=""
                  />
                </div>
                <p class="inbox-item-author">Adhamdannaway</p>
                <p class="inbox-item-text">This theme is awesome!</p>
                <p class="inbox-item-date">
                  <a href="#" class="btn btn-sm btn-link text-info font-13">
                    Reply
                  </a>
                </p>
              </div>
            </div>
            <!-- end inbox-widget -->
          </div>
          <!-- end card-body-->
        </div>
        <!-- end card-->
      </div>
      <!-- end col-->

      <div class="col-xl-8 col-lg-7">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
              <li class="nav-item" v-for="(tab, index) in tabs" :key="index">
                <a
                  href="#"
                  class="nav-link rounded-0"
                  @click="activeTab = index"
                  :class="{ active: activeTab === index }"
                >
                  {{ tab.label }}
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <template v-for="(tab, index) in tabs">
                <component
                  :key="index"
                  v-model="user"
                  :is="tab.component"
                  v-if="index === activeTab"
                />
              </template>
              <!-- end settings content-->
            </div>
            <!-- end tab-content -->
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row-->
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { shallowRef } from "vue";
import UserService from "@/services/user.service";
// import tab
import AboutmeTab from "@/views/admin/tabs/AboutmeTab.vue";
import SettingTab from "@/views/admin/tabs/SettingTab.vue";
import WorkingTab from "@/views/admin/tabs/WorkingTab.vue";
export default defineComponent({
  components: {
    AboutmeTab,
    SettingTab,
    WorkingTab,
  },
  computed: {
    path(): any {
      return this.$route.path;
    },
  },
  data() {
    const title = this.$route.params.id ? "view user" : "edit profile";
    return {
      title,
      user: {
        address: "",
        avatar: "",
        birthday: "",
        created_at: "",
        email: "",
        email_verified_at: "",
        gender: "",
        id: "",
        name: "",
        phone: "",
        role: "",
        roleName: "",
        updated_at: "",
      },
      loadingUser: false,
      activeTab: 1,
      tabs: [
        { label: "About", component: shallowRef(AboutmeTab) },
        { label: "Working", component: shallowRef(WorkingTab) },
        { label: "Setting", component: shallowRef(SettingTab) },
      ],
    };
  },
  watch: {
    path(newValue, oldValue) {
      this.user = {
        address: "",
        avatar: "",
        birthday: "",
        created_at: "",
        email: "",
        email_verified_at: "",
        gender: "",
        id: "",
        name: "",
        phone: "",
        role: "",
        roleName: "",
        updated_at: "",
      };
      this.getUser();
    },
  },
  mounted() {
    this.getUser();
  },
  methods: {
    getUser() {
      this.loadingUser = true;
      if (this.$route.params.id) {
        UserService.getUserByID(this.$route.params.id)
          .then((response) => {
            this.user = response.data.data;
            this.loadingUser = false;
          })
          .catch((error) => {
            console.log(error);
            this.loadingUser = false;
          });
      } else {
        UserService.getUserByToken()
          .then((response) => {
            this.user = response.data.data;
            this.loadingUser = false;
          })
          .catch((error) => {
            console.log(error);
            this.loadingUser = false;
          });
      }
    },
  },
});
</script>

<style></style>
