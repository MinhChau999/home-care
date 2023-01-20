<template>
  <div class="booking-detail">
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
                <li class="breadcrumb-item active">Order Details</li>
              </ol>
            </div>
            <h4 class="page-title">Order Details</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="status">
        <div class="row justify-content-center" v-if="loading">
          <div class="mt-3 mb-2 pb-5">
            <div class="spinner-border text-primary"></div>
          </div>
        </div>
        <div
          class="row justify-content-center"
          @click="modalStatus.showModal = true"
          :style="{ cursor: 'pointer' }"
          v-else
        >
          <div class="col-lg-7 col-md-10 col-sm-11">
            <div class="horizontal-steps mt-3 mb-3 pb-5">
              <div class="horizontal-steps-content">
                <div
                  class="step-item"
                  :class="{
                    danger: booking.status == 2,
                    current: booking.status == 0,
                  }"
                >
                  <span
                    v-tooltip="{
                      content:
                        convertDate(booking.create_at) +
                        ' ' +
                        convertTime2(booking.create_at),
                      html: true,
                      placement: 'bottom',
                    }"
                    >Waiting</span
                  >
                </div>
                <div
                  class="step-item"
                  :class="{
                    danger: booking.status == 2,
                    current: booking.status == 1,
                  }"
                >
                  <span
                    v-tooltip="{
                      content:
                        convertDate(booking.date_booking) +
                        ' ' +
                        convertTime(booking.time_booking),
                      html: true,
                      placement: 'bottom',
                    }"
                    >Accept</span
                  >
                </div>

                <div
                  class="step-item danger current"
                  v-if="booking.status == 2"
                >
                  <span>Reject</span>
                </div>
                <div
                  class="step-item"
                  :class="{
                    current: booking.status == 3,
                  }"
                  v-else
                >
                  <span>Done</span>
                </div>
              </div>
              <div
                :class="{
                  'disregard-line': booking.status == 2,
                  'process-line': booking.status != 2,
                }"
                :style="{
                  width:
                    booking.status == 0
                      ? '0%'
                      : booking.status == 1
                      ? '50%'
                      : '100%',
                }"
              ></div>
            </div>
          </div>
        </div>
      </div>

      <!-- end row -->

      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3">Items from Order #12537</h4>
              <!-- end table-responsive -->

              <ul class="list-unstyled mb-0">
                <li>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Payment Type:</span>
                    Credit Card
                  </p>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Provider:</span> Visa
                    ending in 2851
                  </p>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Valid Date:</span>
                    02/2020
                  </p>
                  <p class="mb-0">
                    <span class="font-weight-bold mr-2">CVV:</span> xxx
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3">Order Summary</h4>

              <div class="table-responsive">
                <table class="table mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Description</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Grand Total :</td>
                      <td>$1641</td>
                    </tr>
                    <tr>
                      <td>Shipping Charge :</td>
                      <td>$23</td>
                    </tr>
                    <tr>
                      <td>Estimated Tax :</td>
                      <td>$19.22</td>
                    </tr>
                    <tr>
                      <th>Total :</th>
                      <th>$1683.22</th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- end table-responsive -->
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3">Shipping Information</h4>

              <h5>Stanley Jones</h5>

              <address class="mb-0 font-14 address-lg">
                795 Folsom Ave, Suite 600<br />
                San Francisco, CA 94107<br />
                <abbr title="Phone">P:</abbr> (123) 456-7890 <br />
                <abbr title="Mobile">M:</abbr> (+01) 12345 67890
              </address>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3">Billing Information</h4>

              <ul class="list-unstyled mb-0">
                <li>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Payment Type:</span>
                    Credit Card
                  </p>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Provider:</span> Visa
                    ending in 2851
                  </p>
                  <p class="mb-2">
                    <span class="font-weight-bold mr-2">Valid Date:</span>
                    02/2020
                  </p>
                  <p class="mb-0">
                    <span class="font-weight-bold mr-2">CVV:</span> xxx
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3">Delivery Info</h4>

              <div class="text-center">
                <i class="mdi mdi-truck-fast h2 text-muted"></i>
                <h5><b>UPS Delivery</b></h5>
                <p class="mb-1"><b>Order ID :</b> xxxx235</p>
                <p class="mb-0"><b>Payment Mode :</b> COD</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <transition name="modal-status">
      <!-- @click="showModal = false" -->
      <div
        v-if="modalStatus.showModal"
        id="standard-modal"
        class="modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="standard-modalLabel"
        aria-modal="true"
        style="padding-right: 17px; display: block"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content dropdown-menu-animated">
            <div class="modal-header">
              <h4 class="modal-title" id="standard-modalLabel">
                Change Status
              </h4>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-hidden="true"
                @click="modalStatus.showModal = false"
              >
                ×
              </button>
            </div>
            <div class="modal-body">
              <div class="button-list">
                <button
                  type="button"
                  class="btn btn-outline-warning btn-rounded"
                  :class="{ focus: modalStatus.status == 0 }"
                  @click="modalStatus.status = 0"
                >
                  <i class="mdi mdi-timer-sand"></i> Waiting
                </button>
                <button
                  type="button"
                  class="btn btn-outline-info btn-rounded"
                  :class="{ focus: modalStatus.status == 1 }"
                  @click="modalStatus.status = 1"
                >
                  <i class="mdi mdi-clock-check-outline"></i> Accept
                </button>
                <button
                  type="button"
                  class="btn btn-outline-success btn-rounded"
                  :class="{ focus: modalStatus.status == 3 }"
                  @click="modalStatus.status = 3"
                >
                  <i class="mdi mdi-check-bold"></i> Done
                </button>
                <button
                  type="button"
                  class="btn btn-outline-danger btn-rounded"
                  :class="{ focus: modalStatus.status == 2 }"
                  @click="modalStatus.status = 2"
                >
                  <i class="mdi mdi-cancel"></i> Reject
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <!-- pending -->
              <div class="form-group mb-0 text-center">
                <div
                  :class="{
                    'spinner-border text-primary': modalStatus.isPendingStatus,
                  }"
                  role="status"
                ></div>
              </div>
              <!-- end pending  -->
              <button
                type="button"
                class="btn btn-light"
                data-dismiss="modal"
                @click="modalStatus.showModal = false"
              >
                Close
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="saveChangeStatus"
              >
                <i class="mdi mdi-content-save"></i> Save
              </button>
            </div>
          </div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </transition>
  </div>

  <!-- End Content -->
</template>

<script lang="ts">
import { defineComponent } from "vue";
import BookingService from "@/services/booking.service";
import Notification from "@/services/notification.service";
import vClickOutside from "click-outside-vue3";
import moment from "moment";

interface modalStatus {
  showModal: boolean;
  isPendingStatus: boolean;
  idModal: any;
  status: any;
}

export default defineComponent({
  directives: {
    clickOutside: vClickOutside.directive,
  },
  data() {
    const title = "booking home";
    const booking: any = "";
    const doctor: any = "";
    const patient: any = "";
    const service: any = "";
    const specialist: any = "";

    const modalStatus = {
      showModal: false,
      isPendingStatus: false,
      idModal: "",
      status: "",
    } as modalStatus;

    return {
      title,
      booking,
      doctor,
      patient,
      service,
      specialist,
      modalStatus,
      loading: false,
      linkLimitPage: 5,
      showExport: false,
    };
  },

  watch: {
    booking: function (newVal, oldVal) {
      this.modalStatus.idModal = this.booking.id;
      this.modalStatus.status = this.booking.status;
    },
  },
  async mounted() {
    await this.loadData();
  },

  methods: {
    loadData() {
      this.loading = true;
      BookingService.getBookingHomeById(this.$route.params.id)
        .then((response: any) => {
          this.booking = response.data.data.booking;
          this.doctor = response.data.data.doctor;
          this.patient = response.data.data.patient;
          this.service = response.data.data.service;
          this.specialist = response.data.data.specialist;
          this.loading = false;
          // Notification.success(response.data.message);
        })
        .catch((errors) => {
          Notification.error(errors.response.data.message);
          this.loading = false;
        });
    },

    saveChangeStatus: function () {
      this.modalStatus.isPendingStatus = true;
      BookingService.updateStatusBookingHome(
        {
          status: this.modalStatus.status,
        },
        this.modalStatus.idModal
      )
        .then((response: any) => {
          this.modalStatus.isPendingStatus = false;
          this.modalStatus.showModal = false;
          this.booking.status = response.data.data.status;
          Notification.success(response.data.message);
        })
        .catch((errors) => {
          Notification.error(errors.response.data.message);
          this.modalStatus.isPendingStatus = false;
        });
    },

    convertTime(time: string) {
      let date = new Date("1970-01-01 " + time);
      return date.toLocaleTimeString("en-US", {
        hour: "2-digit",
        minute: "2-digit",
        hour12: true,
      }); // Outputs "02:30 PM"
    },
    convertTime2(time: string) {
      return moment(time).format("hh:mm A");
    },

    convertDate(date: string) {
      return moment(date).format("DD/MM/YYYY"); // Outputs "07/26/2022"
    },

    viewDoctor(id: any): void {
      this.$router.push({
        name: "edit-userid",
        params: { id: id.toString() },
      });
    },

    viewPatient(id: any): void {
      console.log(id);
    },

    viewService(id: any): void {
      console.log(id);
    },

    viewItem(id: any): void {
      console.log(id);
      // this.$router.push({
      //   name: "edit-userid",
      //   params: { id: id.toString() },
      // });
    },

    onClickOutside() {
      if (this.showExport == true) {
        this.showExport = false;
      }
    },
  },
});
</script>
