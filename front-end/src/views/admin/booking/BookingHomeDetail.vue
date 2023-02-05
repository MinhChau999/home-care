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

      <div class="row" v-if="loadDataFlag">
        <!-- start booking -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body" style="min-height: 290px">
              <div class="float-right">
                <a
                  href="javascript: void(0);"
                  class="dropdown-toggle arrow-none card-drop p-0"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-square-edit-outline"></i>
                </a>
              </div>
              <h4 class="header-title mb-3">
                Items from Booking #{{ booking.booking_id }}
              </h4>
              <!-- end table-responsive -->
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Time Booking:</div>
                <div class="col-sm-10">
                  {{
                    convertTime(booking.time_booking) +
                    ", " +
                    convertDate2(booking.date_booking)
                  }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Date Created:</div>
                <div class="col-sm-10">
                  {{ convertDate2(booking.created_at) }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Contact Email:</div>
                <div class="col-sm-10">
                  {{ booking.email_notification }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Address:</div>
                <div class="col-sm-10">
                  {{ booking.address }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Price:</div>
                <div class="col-sm-10">
                  {{ booking.price + " " + "đ" }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-2">Description:</div>
                <div class="col-sm-10">
                  {{ booking.description }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end booking -->

        <!-- start service -->
        <div class="col-lg-4">
          <div class="card">
            <div
              class="card-body"
              style="position: relative; min-height: 290px"
            >
              <div class="text-center">
                <GoogleMap
                  api-key="AIzaSyBmLYZH9ibuYWJzq2qDDC0SMHLwzQOEwiE"
                  :center="{ lat: 10.647291, lng: 107.245695 }"
                  :zoom="11"
                  style="width: 100%; height: 240px"
                >
                </GoogleMap>
              </div>
            </div>
          </div>
        </div>
        <!-- end service -->
      </div>
      <!-- end booking -->

      <div class="row" v-if="loadDataFlag">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body" style="min-height: 250px">
              <div class="mb-3">
                <div class="float-right">
                  <a
                    href="javascript: void(0);"
                    class="dropdown-toggle arrow-none card-drop p-0"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="mdi mdi-square-edit-outline"></i>
                  </a>
                </div>
                <router-link
                  :to="{
                    name: 'edit-userid',
                    params: { id: doctor.id ? doctor.id : 1 },
                  }"
                >
                  <h4 class="header-title" :style="{ color: '#6c757d' }">
                    Doctor Information
                  </h4>
                </router-link>
                <!-- <h4
                class="header-title mb-3"
                :style="{ cursor: 'pointer' }"
                @click="viewDoctor"
              >
                Doctor Information
              </h4> -->
              </div>

              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Name:</div>
                <div class="col-sm-9">
                  {{ doctor.name }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Phone:</div>
                <div class="col-sm-9">
                  {{ doctor.phone }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Email:</div>
                <div class="col-sm-9">
                  {{ doctor.email }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Special:</div>
                <div class="col-sm-9"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body" style="min-height: 250px">
              <div class="mb-3">
                <div class="float-right">
                  <a
                    href="javascript: void(0);"
                    class="dropdown-toggle arrow-none card-drop p-0"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="mdi mdi-square-edit-outline"></i>
                  </a>
                </div>
                <router-link
                  :to="{
                    name: 'edit-userid',
                    params: { id: doctor.id ? doctor.id : 1 },
                  }"
                >
                  <h4 class="header-title" :style="{ color: '#6c757d' }">
                    Patient Information
                  </h4>
                </router-link>
              </div>

              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Name:</div>
                <div class="col-sm-9">
                  {{ patient.name }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Phone:</div>
                <div class="col-sm-9">
                  {{ patient.phone }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Email:</div>
                <div class="col-sm-9">
                  {{ patient.email }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Age:</div>
                <div class="col-sm-9">
                  {{
                    getAge(patient.birthday) +
                    " tuổi (" +
                    convertDate(patient.birthday) +
                    ")"
                  }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body" style="min-height: 250px">
              <div class="mb-3">
                <div class="float-right">
                  <a
                    href="javascript: void(0);"
                    class="dropdown-toggle arrow-none card-drop p-0"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="mdi mdi-square-edit-outline"></i>
                  </a>
                </div>
                <router-link
                  :to="{
                    name: 'edit-userid',
                    params: { id: doctor.id ? doctor.id : 1 },
                  }"
                >
                  <h4 class="header-title" :style="{ color: '#6c757d' }">
                    Service Information
                  </h4>
                </router-link>
              </div>

              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Name:</div>
                <div class="col-sm-9">
                  {{ service.name }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Specialist</div>
                <div class="col-sm-9">
                  {{ specialist.name }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Price</div>
                <div class="col-sm-9">
                  {{ service.price + " đ" }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="font-weight-bold col-sm-3">Image:</div>
                <div class="col-sm-9"></div>
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
import { GoogleMap } from "vue3-google-map";
import { YOUR_GOOGLE_MAPS_API_KEY } from "@/constants";

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
  components: { GoogleMap },
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
      loadDataFlag: false,
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
          this.loadDataFlag = true;
          Notification.success(response.data.message);
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

    convertDate2(date: string) {
      return moment(date).format("dddd, MMMM Do YYYY"); // Outputs "07/26/2022"
    },

    getAge(date: string) {
      return moment().diff(moment(date), "years");
    },

    viewDoctor(): void {
      this.$router.push({
        name: "edit-userid",
        params: { id: this.doctor.id.toString() },
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
