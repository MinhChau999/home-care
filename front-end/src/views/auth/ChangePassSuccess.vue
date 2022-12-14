<template>
  <div class="card-body">
    <!-- email send icon with text-->
    <div class="text-center m-auto">
      <img
        src="@/assets/images/success-green.svg"
        alt="mail sent image"
        height="64"
      />
      <h4 class="text-dark-50 text-center mt-4 font-weight-bold">
        Change Password Success
      </h4>
      <p class="text-muted mb-4">Please loggin</p>
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
      <p class="text-muted">Coderthemes.com</p>
    </footer>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
export default defineComponent({});
</script>

<style></style>
