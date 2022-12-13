<template>
  <div class="card-body">
    <!-- Logo -->
    <!-- <div class="auth-brand text-center text-lg-left">
      <a href="index.html" class="logo-light">
        <span><img src="assets/images/logo.png" alt="" height="18" /></span>
      </a>
    </div> -->

    <!-- title-->
    <h3 class="mt-0">Sign In for Admin</h3>
    <div class="text-muted mb-4">
      Enter your email address and password to access account.
    </div>

    <!-- form -->
    <Form @submit="login" :validation-schema="schema">
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
              'is-invalid': !!errors.length || errors.email,
              'is-valid': meta.valid && meta.touched,
            }"
          />
        </Field>
        <div v-if="errors.email" class="invalid-feedback">
          {{ errors.email }}
        </div>
        <ErrorMessage name="email" class="invalid-feedback mt-1" />
      </div>
      <div class="form-group">
        <a href="#" class="text-muted float-right"
          ><small>Forgot your password?</small></a
        >
        <label for="password">Password</label>
        <Field name="password" v-slot="{ field, errors }">
          <input
            v-bind="field"
            v-model="user.password"
            class="form-control"
            type="password"
            id="password"
            placeholder="Enter your password"
            :class="{
              'is-invalid': !!errors.length || errors.password,
            }"
          />
        </Field>
        <div v-if="errors.password" class="invalid-feedback">
          {{ errors.password }}
        </div>
        <ErrorMessage name="password" class="invalid-feedback mt-1" />
      </div>
      <!-- <div class="form-group mb-3">
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
      </div> -->
      <div v-if="errors.error" class="invalid-feedback mb-2">
        {{ errors.error }}
      </div>
      <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
          <i class="mdi mdi-login"></i> Log In
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
  </div>
  <!-- end .card-body -->
</template>

<script lang="ts">
import Notification from "@/services/notification.service";
import { defineComponent } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default defineComponent({
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const schema = yup.object().shape({
      email: yup
        .string()
        .required("Email is required!")
        .email("Email is invalid!")
        .max(50, "Must be maximum 50 characters!"),
      password: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!"),
    });

    const errors: any = {};
    return {
      user: {
        email: "",
        password: "",
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
    login() {
      this.isPending = true;
      this.errors = {};
      this.$store
        .dispatch("authAdmin/login", this.user)
        .then((response: any) => {
          this.$router.push({ name: "dashboard" });
          Notification.success(response.message);
        })
        .catch((error: any) => {
          Notification.error(error.response.data.data.error);
          this.errors = error.response.data.data;
          console.clear();
          this.isPending = false;
        });
    },
  },
});
</script>
