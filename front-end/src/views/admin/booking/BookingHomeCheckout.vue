<template>
  <div class="booking-checkout">
    <div class="content">
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
                <li class="breadcrumb-item active">Checkout</li>
              </ol>
            </div>
            <h4 class="page-title">Checkout</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!-- Checkout Steps -->
              <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                <li class="nav-item" v-for="(tab, index) in tabs" :key="index">
                  <a
                    href="javascript: void(0);"
                    class="nav-link rounded-0"
                    @click="activeTab = index"
                    :class="{ active: activeTab === index }"
                  >
                    {{ tab.label }}
                  </a>
                </li>
              </ul>

              <!-- Steps Information -->
              <div class="tab-content">
                <!-- Billing Content-->
                <div class="tab-pane show active" id="billing-information">
                  <div class="row">
                    <div class="col-lg-8">
                      <template v-for="(tab, index) in tabs">
                        <component
                          :key="index"
                          v-model="booking"
                          :is="tab.component"
                          v-if="index === activeTab"
                        />
                      </template>

                      <div class="row mt-4">
                        <div class="col-sm-6">
                          <a
                            href="apps-ecommerce-shopping-cart.html"
                            class="btn text-muted d-none d-sm-inline-block btn-link font-weight-semibold"
                          >
                            <i class="mdi mdi-arrow-left"></i> Back to Shopping
                            Cart
                          </a>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                          <div class="text-sm-right">
                            <a
                              href="apps-ecommerce-checkout.html"
                              class="btn btn-danger"
                            >
                              <i class="mdi mdi-cash-multiple mr-1"></i>
                              Continue to Payment
                            </a>
                          </div>
                        </div>
                        <!-- end col -->
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div
                        class="border p-3 mt-4 mt-lg-0 rounded"
                        @click="showBooking"
                      >
                        <h4 class="header-title mb-3">Order Summary</h4>

                        <div class="table-responsive">
                          <table class="table table-centered mb-0">
                            <tbody>
                              <tr>
                                <td>
                                  <img
                                    src="@/assets/images/products/product-1.jpg"
                                    alt="contact-img"
                                    title="contact-img"
                                    class="rounded mr-2"
                                    height="48"
                                  />
                                  <p class="m-0 d-inline-block align-middle">
                                    <a
                                      href="apps-ecommerce-products-details.html"
                                      class="text-body font-weight-semibold"
                                      >Amazing Modern Chair</a
                                    >
                                    <br />
                                    <small>5 x $148.66</small>
                                  </p>
                                </td>
                                <td class="text-right">$743.30</td>
                              </tr>
                              <tr>
                                <td>
                                  <img
                                    src="@/assets/images/products/product-2.jpg"
                                    alt="contact-img"
                                    title="contact-img"
                                    class="rounded mr-2"
                                    height="48"
                                  />
                                  <p class="m-0 d-inline-block align-middle">
                                    <a
                                      href="apps-ecommerce-products-details.html"
                                      class="text-body font-weight-semibold"
                                      >Designer Awesome Chair</a
                                    >
                                    <br />
                                    <small>2 x $99.00</small>
                                  </p>
                                </td>
                                <td class="text-right">$198.00</td>
                              </tr>
                              <tr>
                                <td>
                                  <img
                                    src="@/assets/images/products/product-3.jpg"
                                    alt="contact-img"
                                    title="contact-img"
                                    class="rounded mr-2"
                                    height="48"
                                  />
                                  <p class="m-0 d-inline-block align-middle">
                                    <a
                                      href="apps-ecommerce-products-details.html"
                                      class="text-body font-weight-semibold"
                                      >Biblio Plastic Armchair</a
                                    >
                                    <br />
                                    <small>1 x $129.99</small>
                                  </p>
                                </td>
                                <td class="text-right">$129.99</td>
                              </tr>
                              <tr class="text-right">
                                <td>
                                  <h6 class="m-0">Sub Total:</h6>
                                </td>
                                <td class="text-right">$1071.29</td>
                              </tr>
                              <tr class="text-right">
                                <td>
                                  <h6 class="m-0">Shipping:</h6>
                                </td>
                                <td class="text-right">FREE</td>
                              </tr>
                              <tr class="text-right">
                                <td>
                                  <h5 class="m-0">Total:</h5>
                                </td>
                                <td class="text-right font-weight-semibold">
                                  $1071.29
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- end table-responsive -->
                      </div>
                      <!-- end .border-->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->
                </div>
                <!-- End Billing Information Content-->
              </div>
              <!-- end tab content-->
            </div>
            <!-- end card-body-->
          </div>
          <!-- end card-->
        </div>
        <!-- end col -->
      </div>
      <!-- end row-->
    </div>
  </div>

  <!-- End Content -->
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { shallowRef } from "vue";
import BookingService from "@/services/booking.service";
import Notification from "@/services/notification.service";
import vClickOutside from "click-outside-vue3";
import ConfirmCheckout from "@/views/admin/tabsCheckout/ConfirmCheckout.vue";
import PatientInfoCheckout from "@/views/admin/tabsCheckout/PatientInfoCheckout.vue";
import ServiceInfoCheckout from "@/views/admin/tabsCheckout/ServiceInfoCheckout.vue";

export default defineComponent({
  directives: {
    clickOutside: vClickOutside.directive,
  },
  components: {
    ConfirmCheckout,
    PatientInfoCheckout,
    ServiceInfoCheckout,
  },

  data() {
    const booking = {
      doctor_id: "",
      service_id: "",
      date_booking: "",
      time_booking: "",
      email_notification: "",
      patient_name_booking: "",
      patient_phone_booking: "",
      patient_birth_booking: "",
      address: "",
      price: "",
      description: "",
      patient_id: "",
      booking_id: "",
    };
    return {
      booking,
      activeTab: 0,
      tabs: [
        {
          label: "Service Info",
          component: shallowRef(ServiceInfoCheckout),
        },
        {
          label: "Patient Info",
          component: shallowRef(PatientInfoCheckout),
        },
        { label: "Confirm", component: shallowRef(ConfirmCheckout) },
      ],
    };
  },

  watch: {},

  methods: {
    showBooking() {
      console.log(this.booking);
    },
  },
});
</script>
