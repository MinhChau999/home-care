<template>
  <div class="admin-reset">
    <!-- Logo -->
    <!-- <div class="auth-brand text-center text-lg-left">
      <a href="index.html" class="logo-light">
        <span><img src="assets/images/logo.png" alt="" height="18" /></span>
      </a>
    </div> -->

    <!-- title-->
    <h4 class="mt-0">Reset Password</h4>
    <p class="text-muted mb-4">Enter your new password.</p>

    <!-- form -->
    <Form @submit="resetPasswordUser" :validation-schema="schema">
      <div class="form-group">
        <label>New Password</label>
        <Field name="password" v-slot="{ field }">
          <input
            v-bind="field"
            v-model="user.password"
            class="form-control"
            type="password"
            id="password"
            placeholder="Enter your password"
          />
        </Field>
        <ErrorMessage name="password" class="invalid-feedback mt-1" />
      </div>
      <div class="form-group">
        <label>Confirm New Password</label>
        <Field name="password_confirmation" v-slot="{ field }">
          <input
            v-bind="field"
            v-model="user.password_confirmation"
            class="form-control"
            type="password"
            id="password_confirmation"
            placeholder="Enter your password"
          />
        </Field>
        <ErrorMessage
          name="password_confirmation"
          class="invalid-feedback mt-1"
        />
      </div>
      <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
          <i class="mdi mdi-lock-reset"></i> ConFirm Reset Password
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
      <!-- end pending  -->
    </Form>
    <!-- end form-->
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
    const schema = yup.object().shape({
      password: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!"),
      password_confirmation: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!")
        .oneOf([yup.ref("password"), null], "Passwords must match"),
    });
    return {
      user: {
        password: "",
        password_confirmation: "",
      },
      isPending: false,
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
    resetPasswordUser() {
      this.isPending = true;
      UserService.resetPassword(this.user, this.$route.query.token)
        .then((respone) => {
          this.isPending = false;
          Notification.success(respone.data.message);
          this.$router.push({
            name: "page-success-password",
          });
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
