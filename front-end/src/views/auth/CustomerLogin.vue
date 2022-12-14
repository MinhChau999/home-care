<template>
  <div class="customer-login">
    <!-- Logo -->
    <!-- <div class="auth-brand text-center text-lg-left">
      <a href="index.html" class="logo-dark">
        <span
          ><img src="" alt="" height="18"
        /></span>
      </a>
      <a href="index.html" class="logo-light">
        <span><img src="" alt="" height="18" /></span>
      </a>
    </div> -->

    <!-- title-->
    <h4 class="mt-0">Sign In</h4>
    <p class="text-muted mb-4">
      Enter your email address and password to access account.
    </p>

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
          {{ errors.email[0] }}
        </div>
        <ErrorMessage name="email" class="invalid-feedback" />
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
            :class="{ 'is-invalid': !!errors.length || errors.password }"
          />
        </Field>
        <div v-if="errors.password" class="invalid-feedback">
          {{ errors.password[0] }}
        </div>
        <ErrorMessage name="password" class="invalid-feedback" />
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
    </Form>
    <!-- end form-->

    <!-- Footer-->
    <footer class="footer footer-alt">
      <p class="text-muted">
        Don't have an account?
        <router-link :to="{ name: 'user-register' }" class="text-muted ml-1"
          ><b>Sign Up</b></router-link
        >
      </p>
    </footer>
  </div>
  <!-- end .card-body -->
</template>

<script lang="ts">
import Notification from "@/services/notification.service";
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import { defineComponent } from "vue";

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
      return this.$store.state.authUser.status.loggedIn;
    },
  },

  mounted() {
    if (this.loggedIn) {
      this.$router.push({ name: "landing-page" });
    }
  },

  methods: {
    login() {
      this.isPending = true;
      this.errors = {};
      this.$store
        .dispatch("authUser/login", this.user)
        .then((response: any) => {
          this.$router.push({ name: "landing-page" });
          Notification.success(response.message);
        })
        .catch((error: any) => {
          Notification.error(error.response.data.data.error);
          this.errors = error.response.data.data;
          this.isPending = false;
        });
    },
  },
});
</script>
