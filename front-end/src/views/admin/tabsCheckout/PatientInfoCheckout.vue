<template>
  <div class="patient-info" id="patientInfor">
    <div class="patient">
      <h4 class="mt-2">Billing information</h4>

      <p class="text-muted mb-4">
        Fill the form below in order to send you the order's invoice.
      </p>

      <!-- Pay with Paypal box-->
      <div class="border p-3 mb-3 rounded">
        <div class="row">
          <div class="col-sm-8">
            <div class="custom-control custom-radio">
              <input
                type="radio"
                id="BillingOptRadio2"
                name="billingOptions"
                class="custom-control-input"
              />
              <label
                class="custom-control-label font-16 font-weight-bold"
                for="BillingOptRadio2"
                >No Account</label
              >
            </div>
            <p class="mb-0 pl-3 pt-1">
              Patient does not have an account. Please complete all information.
            </p>
          </div>
        </div>
      </div>
      <!-- end Pay with Paypal box-->

      <!-- Credit/Debit Card box-->
      <div class="border p-3 mb-3 rounded">
        <div class="row">
          <div class="col-sm-8">
            <div class="custom-control custom-radio">
              <input
                type="radio"
                id="BillingOptRadio1"
                name="billingOptions"
                class="custom-control-input"
                checked=""
              />
              <label
                class="custom-control-label font-16 font-weight-bold"
                for="BillingOptRadio1"
                >Have Account</label
              >
            </div>

            <p class="mb-0 pl-3 pt-1">
              Patient has an account. Please choose one.
            </p>
          </div>
        </div>
        <!-- end row -->
        <div class="row mt-2">
          <div class="col-12">
            <div class="form-group">
              <label for="new-adr-address">Address</label>
              <select class="form-control custom-select">
                <option value="">-- Choose --</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="phone">Phone</option>
                <option value="birthday">Birthday</option>
                <option value="role">Role</option>
              </select>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end Credit/Debit Card box-->

      <form>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="billing-first-name"
                >Name <span class="text-danger">*</span></label
              >
              <input
                class="form-control"
                type="text"
                placeholder="Enter your name"
                id="billing-first-name"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="billing-last-name"
                >Birthday <span class="text-danger">*</span></label
              >
              <input
                class="form-control"
                type="date"
                placeholder="Enter your birth date"
                id="billing-last-name"
              />
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="billing-email-address"
                >Email <span class="text-danger">*</span></label
              >
              <input
                class="form-control"
                type="email"
                placeholder="Enter your email"
                id="billing-email-address"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="billing-phone"
                >Phone <span class="text-danger">*</span></label
              >
              <input
                class="form-control"
                type="text"
                placeholder="(xx) xxx xxxx xxx"
                id="billing-phone"
              />
            </div>
          </div>
        </div>
        <!-- end row -->
      </form>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  // component properties and methods
});
</script>
