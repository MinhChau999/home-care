<template>
  <div class="admin-fogot">
    <!-- Logo -->
    <!-- <div class="auth-brand text-center text-lg-left">
      <a href="index.html" class="logo-light">
        <span><img src="assets/images/logo.png" alt="" height="18" /></span>
      </a>
    </div> -->

    <!-- title-->
    <h4 class="mt-0">Reset Password</h4>
    <p class="text-muted mb-4">
      Enter your email address and we'll send you an email with instructions to
      reset your password.
    </p>

    <!-- form -->
    <Form @submit="fogotPassword" :validation-schema="schema">
      <div class="form-group">
        <label for="emailaddress">Email address</label>
        <Field name="email" v-slot="{ field, errors, meta }">
          <input
            v-model="user.email"
            v-bind="field"
            class="form-control"
            type="email"
            id="emailaddress"
            placeholder="Enter your email"
            :class="{
              'is-invalid': !!errors.length,
              'is-valid': meta.valid && meta.touched,
            }"
          />
        </Field>
        <div v-if="errors.email" class="invalid-feedback">
          {{ errors.email }}
        </div>
        <ErrorMessage name="email" class="invalid-feedback mt-1" />
      </div>
      <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
          <i class="mdi mdi-lock-reset"></i> Reset Password
        </button>
      </div>
      <!-- pending -->
      <div class="form-group mb-0 mt-2 text-center">
        <div
          :class="{ 'spinner-border text-primary': isPending }"
          role="status"
        ></div>
      </div>
      <!-- end pending  -->
    </Form>
    <!-- end form-->
    <!-- Footer-->
    <footer class="footer footer-alt">
      <p class="text-muted">
        Back to Log in
        <router-link :to="{ name: 'admin-login' }" class="text-muted ml-1"
          ><b>Login For Admin</b></router-link
        >
      </p>
    </footer>
  </div>
  <!-- end .card-body -->
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import UserService from "@/services/user.service";
import Notification from "@/services/notification.service";

export default defineComponent({
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const errors: any = {};
    const schema = yup.object().shape({
      email: yup
        .string()
        .required("Email is required!")
        .email("Email is invalid!")
        .max(50, "Must be maximum 50 characters!"),
    });
    return {
      user: {
        email: "",
      },
      isPending: false,
      errors,
      schema,
    };
  },

  computed: {
    loggedIn() {
      return this.$store.state.authAdmin.status.loggedIn;
    },
  },

  mounted() {
    if (this.loggedIn) {
      this.$router.push({ name: "dashboard" });
    }
  },

  methods: {
    fogotPassword() {
      this.isPending = true;
      this.errors = {};
      UserService.fogotPassword(this.user)
        .then((respone) => {
          this.isPending = false;
          if (respone.data.success) {
            Notification.success(respone.data.message);
            this.$router.push({
              name: "page-confirm-password",
              params: { email: this.user.email },
            });
          }
        })
        .catch((error) => {
          if (error.code == "ERR_NETWORK") {
            Notification.error("Kết nối thất bại");
          } else {
            Notification.error(error.response.data.message);
          }
          this.isPending = false;
        });
    },
  },
});
</script>
