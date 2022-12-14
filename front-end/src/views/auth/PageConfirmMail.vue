<template>
  <div class="card-body">
    <!-- email send icon with text-->
    <div class="text-center m-auto">
      <img
        src="@/assets/images/mail_sent.svg"
        alt="mail sent image"
        height="64"
      />
      <h4 class="text-dark-50 text-center mt-4 font-weight-bold">
        Please check your email
      </h4>
      <p class="text-muted mb-4">
        A email has been send to <b>{{ email }}</b
        >. Please check for an email from company and click on the included link
        to reset your password.
      </p>
    </div>

    <!-- form -->
    <form>
      <div class="form-group mb-0 text-center">
        <router-link :to="{ name: 'landing-page' }">
          <button class="btn btn-primary btn-block" type="submit">
            <i class="mdi mdi-home mr-1"></i> Back to Home
          </button>
        </router-link>
      </div>
    </form>
    <!-- end form-->

    <!-- Footer-->
    <footer class="footer footer-alt">
      <p class="text-muted">2018 - 2020 © Hyper - Coderthemes.com</p>
    </footer>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
export default defineComponent({
  props: {
    email: String,
  },
});
</script>

<style></style>
