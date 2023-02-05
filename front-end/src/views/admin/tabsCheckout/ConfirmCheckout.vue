<template>
  <div class="confirm" id="confirm">
    <div class="confirm">
      <h4 class="mt-2">Payment Selection</h4>

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
                >Pay with Paypal</label
              >
            </div>
            <p class="mb-0 pl-3 pt-1">
              You will be redirected to PayPal website to complete your purchase
              securely.
            </p>
          </div>
          <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
            <img
              src="@/assets/images/payments/paypal.png"
              height="25"
              alt="paypal-img"
            />
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
                >Credit / Debit Card</label
              >
            </div>
            <p class="mb-0 pl-3 pt-1">
              Safe money transfer using your bank account. We support
              Mastercard, Visa, Discover and Stripe.
            </p>
          </div>
          <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
            <img
              src="@/assets/images/payments/master.png"
              height="24"
              alt="master-card-img"
            />
            <img
              src="@/assets/images/payments/discover.png"
              height="24"
              alt="discover-card-img"
            />
            <img
              src="@/assets/images/payments/visa.png"
              height="24"
              alt="visa-card-img"
            />
            <img
              src="@/assets/images/payments/stripe.png"
              height="24"
              alt="stripe-card-img"
            />
          </div>
        </div>
        <!-- end row -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="form-group">
              <label for="card-number">Card Number</label>
              <input
                type="text"
                id="card-number"
                class="form-control"
                data-toggle="input-mask"
                data-mask-format="0000 0000 0000 0000"
                placeholder="4242 4242 4242 4242"
                maxlength="19"
              />
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="card-name-on">Name on card</label>
              <input
                type="text"
                id="card-name-on"
                class="form-control"
                placeholder="Master Shreyu"
              />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="card-expiry-date">Expiry date</label>
              <input
                type="text"
                id="card-expiry-date"
                class="form-control"
                data-toggle="input-mask"
                data-mask-format="00/00"
                placeholder="MM/YY"
                maxlength="5"
              />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="card-cvv">CVV code</label>
              <input
                type="text"
                id="card-cvv"
                class="form-control"
                data-toggle="input-mask"
                data-mask-format="000"
                placeholder="012"
                maxlength="3"
              />
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end Credit/Debit Card box-->

      <!-- Pay with Payoneer box-->
      <div class="border p-3 mb-3 rounded">
        <div class="row">
          <div class="col-sm-8">
            <div class="custom-control custom-radio">
              <input
                type="radio"
                id="BillingOptRadio3"
                name="billingOptions"
                class="custom-control-input"
              />
              <label
                class="custom-control-label font-16 font-weight-bold"
                for="BillingOptRadio3"
                >Pay with Payoneer</label
              >
            </div>
            <p class="mb-0 pl-3 pt-1">
              You will be redirected to Payoneer website to complete your
              purchase securely.
            </p>
          </div>
          <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
            <img
              src="@/assets/images/payments/payoneer.png"
              height="30"
              alt="paypal-img"
            />
          </div>
        </div>
      </div>
      <!-- end Pay with Payoneer box-->

      <!-- Cash on Delivery box-->
      <div class="border p-3 mb-3 rounded">
        <div class="row">
          <div class="col-sm-8">
            <div class="custom-control custom-radio">
              <input
                type="radio"
                id="BillingOptRadio4"
                name="billingOptions"
                class="custom-control-input"
              />
              <label
                class="custom-control-label font-16 font-weight-bold"
                for="BillingOptRadio4"
                >Cash on Delivery</label
              >
            </div>
            <p class="mb-0 pl-3 pt-1">
              Pay with cash when your order is delivered.
            </p>
          </div>
          <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
            <img
              src="@/assets/images/payments/cod.png"
              height="22"
              alt="paypal-img"
            />
          </div>
        </div>
      </div>
      <!-- end Cash on Delivery box-->

      <!-- end row-->
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  // component properties and methods
});
</script>
