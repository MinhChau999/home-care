<template>
  <div class="booking-manage">
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
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
          <h4 class="page-title text-first-uppercase">{{ title }}</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-1">
              <div class="col-sm-4">
                <router-link
                  :to="{ name: 'user-create' }"
                  class="btn btn-danger mb-2"
                  ><i class="mdi mdi-plus-circle mr-2"></i> Add {{ title }}
                </router-link>
              </div>
              <div class="col-sm-8">
                <div class="text-sm-right">
                  <button
                    type="button"
                    @click="loadData"
                    class="btn btn-primary mb-2 mr-1"
                  >
                    <i class="mdi mdi-autorenew"></i>
                  </button>
                  <div class="btn-group mb-2">
                    <button
                      type="button"
                      class="btn btn-light dropdown-toggle mr-1"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      @click="showExport = !showExport"
                      v-click-outside="onClickOutside"
                    >
                      Export
                    </button>
                    <div
                      class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown mt-2"
                      :class="{ show: showExport }"
                      aria-labelledby="topbar-userdrop"
                    >
                      <a
                        class="dropdown-item"
                        href="#"
                        @click="exportData('html')"
                        >html</a
                      >
                      <a
                        class="dropdown-item"
                        @click="exportData('json')"
                        href="#"
                        >json</a
                      >
                      <a
                        class="dropdown-item"
                        @click="exportData('txt')"
                        href="#"
                        >txt</a
                      >
                      <a
                        class="dropdown-item"
                        @click="exportData('csv')"
                        href="#"
                        >csv</a
                      >
                      <a
                        class="dropdown-item"
                        @click="exportData('xls')"
                        href="#"
                        >xls</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6 row">
                <div class="col-md-4">
                  <span><h5>Rows per page:</h5></span>
                  <div class="customize-rows-per-page">
                    <select
                      class="select-items form-control custom-select"
                      @change="updateRowsPerPageSelect"
                    >
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-5">
                  <span><h5>Status:</h5></span>
                  <div class="customize-rows-per-page">
                    <select
                      class="select-items form-control custom-select"
                      @change="
                        (event) => (
                          (searchField = 'status'),
                          (searchValue = event.target.value)
                        )
                      "
                    >
                      <option value="">-- Choose --</option>
                      <option value="0">Waiting</option>
                      <option value="1">Accept</option>
                      <option value="2">Reject</option>
                      <option value="3">Done</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <span><h5>Field:</h5></span>
                  <select
                    v-model="searchField"
                    class="form-control custom-select"
                    @change="searchValue = ''"
                  >
                    <option value="">-- Choose --</option>
                    <option
                      v-for="item in searchName"
                      v-bind:key="item"
                      v-bind:value="item"
                    >
                      {{ item.charAt(0).toUpperCase() + item.slice(1) }}
                    </option>
                  </select>
                </div>
                <div class="col-md-6">
                  <span><h5>Search:</h5></span>
                  <input
                    class="form-control"
                    type="text"
                    placeholder="Search..."
                    @input="(event) => (searchValue = event.target.value)"
                  />
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div
                class="col-sm-6 selected"
                :class="{
                  show: itemsSelected[0],
                }"
              >
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary">
                    <i class="mdi mdi-archive font-16"></i>
                  </button>
                  <button type="button" class="btn btn-secondary">
                    <i class="mdi mdi-alert-octagon font-16"></i>
                  </button>
                  <button type="button" class="btn btn-secondary">
                    <i class="mdi mdi-delete-variant font-16"></i>
                  </button>
                </div>
                <div class="btn-group ml-2">
                  <button
                    type="button"
                    class="btn btn-secondary dropdown-toggle arrow-none"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="mdi mdi-folder font-16"></i>
                    <i class="mdi mdi-chevron-down"></i>
                  </button>
                  <div class="dropdown-menu">
                    <span class="dropdown-header">Move to:</span>
                    <a class="dropdown-item" href="javascript: void(0);"
                      >Social</a
                    >
                    <a class="dropdown-item" href="javascript: void(0);"
                      >Promotions</a
                    >
                    <a class="dropdown-item" href="javascript: void(0);"
                      >Updates</a
                    >
                    <a class="dropdown-item" href="javascript: void(0);"
                      >Forums</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <!-- end col-->
            <!-- show-index -->
            <EasyDataTable
              ref="dataTable"
              buttons-pagination
              theme-color="#1d90ff"
              v-model:items-selected="itemsSelected"
              table-class-name="customize-table"
              alternating
              :search-field="searchField"
              :search-value="searchValue"
              :rows-per-page="5"
              :headers="headers"
              :items="items"
              :loading="loading"
              show-index
              hide-footer
            >
              <template #item-bookingID="{ booking, id }">
                <a
                  href="javascript:void(0);"
                  @click="viewItem(id)"
                  class="text-body font-weight-bold"
                  >#{{ booking }}</a
                >
              </template>
              <template #item-patient="{ patient, patient_avatar, patient_id }">
                <div class="table-user">
                  <img :src="patient_avatar" class="mr-2 rounded-circle" />
                  <a
                    href="javascript:void(0);"
                    class="text-dark"
                    @click="viewPatient(patient_id)"
                    >{{ patient }}</a
                  >
                </div>
              </template>
              <template #item-service="{ service, service_id }">
                <div class="table-user">
                  <a
                    href="javascript:void(0);"
                    class="text-dark"
                    @click="viewService(service_id)"
                    >{{ service }}</a
                  >
                </div>
              </template>
              <template #item-doctor="{ doctor, doctor_avatar, doctor_id }">
                <div class="table-user">
                  <img :src="doctor_avatar" class="mr-2 rounded-circle" />
                  <a
                    href="javascript:void(0);"
                    class="text-dark"
                    @click="viewDoctor(doctor_id)"
                    >{{ doctor }}</a
                  >
                </div>
              </template>
              <template #item-date="{ date, time }">
                {{ date
                }}<small class="text-muted ml-1">
                  {{ convertTime(time) }}</small
                >
              </template>
              <template #item-status="{ id, status, statusName }">
                <h5>
                  <span
                    class="badge"
                    :class="{
                      'badge-warning-lighten': status == 0,
                      'badge-info-lighten': status == 1,
                      'badge-danger-lighten': status == 2,
                      'badge-success-lighten': status == 3,
                    }"
                    ><i
                      class="mdi"
                      :class="{
                        'mdi-timer-sand': status == 0,
                        'mdi-clock-check-outline': status == 1,
                        'mdi-cancel': status == 2,
                        'mdi-check-bold': status == 3,
                      }"
                    ></i
                    >{{ statusName }}</span
                  >
                  <span class="badge">
                    <a
                      href="javascript:void(0);"
                      class="action-icon-mini"
                      @click="modalStatus.setIdModal(id, status)"
                    >
                      <i class="mdi mdi-square-edit-outline"></i></a
                  ></span>
                </h5>
              </template>
              <template #loading>
                <div class="mt-4">
                  <div
                    class="spinner-grow text-primary ml-1 mr-1"
                    role="status"
                  ></div>
                  <div
                    class="spinner-grow text-primary ml-1 mr-1"
                    role="status"
                  ></div>
                  <div
                    class="spinner-grow text-primary ml-1 mr-1"
                    role="status"
                  ></div>
                </div>
              </template>
              <template #item-operation="item">
                <div class="table-action">
                  <a
                    @click="viewItem(item.id)"
                    href="javascript:void(0);"
                    class="action-icon"
                  >
                    <i class="mdi mdi-eye"></i
                  ></a>
                  <a
                    @click="deleteItem(item)"
                    href="javascript:void(0);"
                    class="action-icon"
                  >
                    <i class="mdi mdi-delete"></i
                  ></a>
                </div>
              </template>
            </EasyDataTable>
            <div class="row mb-1 mt-3">
              <div class="col-sm-12 col-md-5">
                <div
                  class="dataTables_info"
                  id="products-datatable_info"
                  role="status"
                  aria-live="polite"
                >
                  Showing {{ title }}s {{ currentPageFirstIndex }} to
                  {{ currentPageLastIndex }} of
                  {{ clientItemsLength }}
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <ul
                  class="pagination pagination-rounded mb-0 justify-content-end"
                >
                  <li
                    class="page-item"
                    @click="prevPage"
                    :class="{ disabled: currentPaginationNumber == 1 }"
                  >
                    <a
                      class="page-link"
                      href="javascript: void(0);"
                      aria-label="Previous"
                    >
                      <i class="uil-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li
                    v-for="paginationNumber in maxPaginationNumber"
                    :key="paginationNumber"
                    class="page-item selected"
                    :class="{
                      active: paginationNumber === currentPaginationNumber,
                      show: paginationNumber <= to && paginationNumber >= from,
                    }"
                    @click="updatePage(paginationNumber)"
                  >
                    <a
                      class="page-link"
                      href="javascript: void(0);"
                      aria-label="Next"
                    >
                      {{ paginationNumber }}
                    </a>
                  </li>
                  <li
                    class="page-item"
                    @click="nextPage"
                    :class="{
                      disabled: currentPaginationNumber == maxPaginationNumber,
                    }"
                  >
                    <a
                      class="page-link"
                      href="javascript: void(0);"
                      aria-label="Next"
                    >
                      <i class="uil-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- multi-sort -->
          </div>
          <!-- end card-body-->
        </div>
        <!-- end card-->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

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
          <div class="modal-content dropdown-menu-animated" @click.stop>
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
import type { Header, Item } from "vue3-easy-data-table";
import { defineComponent } from "vue";
import BookingService from "@/services/booking.service";
import ExcelParser from "@/services/export.service";
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
    // const sortBy: string[] = ["number", "weight"];
    // const sortType: SortType[] = ["desc", "asc"];
    const title = "booking home";
    const searchField: any = "";
    const searchValue: any = "";

    const itemsSelected: Item[] = [];
    const headers: Header[] = [
      // { text: "#", value: "id" },
      { text: "ID Booking", value: "bookingID", sortable: true },
      { text: "Date", value: "date", sortable: true },
      { text: "Patient", value: "patient", sortable: true },
      { text: "Service", value: "service", sortable: true },
      { text: "Doctor", value: "doctor", sortable: true },
      { text: "Status", value: "status", sortable: true },
      { text: "Operation", value: "operation" },
    ];

    const searchName = ["booking", "date", "patient", "doctor", "service"];

    const modalStatus = {
      showModal: false,
      isPendingStatus: false,
      idModal: "",
      status: "",
      setIdModal: function (id: any, status: any) {
        this.showModal = true;
        this.idModal = id;
        this.status = status;
      },
    } as modalStatus;

    const items: Item[] = [];
    // index related
    const from = 1;
    const to = 5;

    return {
      title,
      items,
      headers,
      searchField,
      searchValue,
      searchName,
      itemsSelected,
      modalStatus,
      loading: false,
      linkLimitPage: 5,
      from,
      to,
      showExport: false,
    };
  },
  async mounted() {
    await this.loadData();
  },

  computed: {
    // index related
    currentPageFirstIndex(): number {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).currentPageFirstIndex
        : 0;
    },
    currentPageLastIndex(): number {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).currentPageLastIndex
        : 0;
    },
    clientItemsLength(): number {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).clientItemsLength
        : 0;
    },

    // pagination related
    maxPaginationNumber(): number {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).maxPaginationNumber
        : 0;
    },
    currentPaginationNumber(): number {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).currentPaginationNumber
        : 0;
    },

    isFirstPage(): boolean {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).isFirstPage
        : 0;
    },
    isLastPage(): boolean {
      return this.items.length > 0
        ? (this.$refs.dataTable as any).isLastPage
        : 0;
    },
  },
  methods: {
    loadData() {
      this.loading = true;
      BookingService.getAllBookingHome()
        .then((response: any) => {
          this.items = response.data.data;
          this.itemsSelected = [];
          this.loading = false;
          // Notification.success(response.data.message);
        })
        .catch((errors) => {
          Notification.error(errors.response.data.message);
          this.items = [];
          this.loading = false;
        });
    },
    updateRowsPerPageSelect(e: Event): void {
      (this.$refs.dataTable as any).updateRowsPerPageActiveOption(
        Number((e.target as HTMLInputElement).value)
      );
      this.from = 1;
      if (this.maxPaginationNumber < 5) {
        this.to = this.maxPaginationNumber;
      } else {
        this.to = 5;
      }
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
          let result: any = this.items
            .map((el, index) => ({ el, index }))
            .find((x) => x.el.id == this.modalStatus.idModal);
          result.el.status = response.data.data.status;
          result.el.statusName = response.data.data.statusName;
          this.items.splice(result.index, 1, result.el);
          Notification.success(response.data.message);
        })
        .catch((errors) => {
          Notification.error(errors.response.data.message);
          this.modalStatus.isPendingStatus = false;
        });
    },

    statusSelect(e: Event): void {
      this.searchField = "status";
      this.searchValue = (e.target as HTMLInputElement).value;
    },

    changeFromAndTo(): void {
      let halfTotalLink = Math.floor(this.linkLimitPage / 2);
      this.from = this.currentPaginationNumber - halfTotalLink;
      this.to = this.currentPaginationNumber + halfTotalLink;
      if (this.currentPaginationNumber <= halfTotalLink) {
        this.to = this.linkLimitPage;
        this.from = 1;
      }
      if (
        this.maxPaginationNumber - this.currentPaginationNumber <
        halfTotalLink
      ) {
        this.from = this.maxPaginationNumber - this.linkLimitPage + 1;
        this.to = this.maxPaginationNumber;
      }
    },

    convertTime(time: string) {
      let date = new Date("1970-01-01 " + time);
      return date.toLocaleTimeString("en-US", {
        hour: "2-digit",
        minute: "2-digit",
        hour12: true,
      }); // Outputs "02:30 PM"
    },
    convertDate(date: string) {
      return moment(date).format("DD/MM/YYYY"); // Outputs "07/26/2022"
    },
    updatePage(paginationNumber: number): void {
      (this.$refs.dataTable as any).updatePage(paginationNumber);
      this.changeFromAndTo();
    },
    nextPage(): void {
      (this.$refs.dataTable as any).nextPage();
      this.changeFromAndTo();
    },
    prevPage(): void {
      (this.$refs.dataTable as any).prevPage();
      this.changeFromAndTo();
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
      console.log(this.items.find((x) => x.id == 9));

      this.$router.push({
        name: "booking-home-detail",
        params: { id: id.toString() },
      });
    },
    onClickOutside() {
      if (this.showExport == true) {
        this.showExport = false;
      }
    },
    exportData(type: string) {
      ExcelParser.exportDataFromJSON(this.items, this.title, type);
    },
    deleteItem(val: any) {
      if (confirm("Do you really want to delete?")) {
        this.loading = true;
        BookingService.deleteBookingHome(val.id)
          .then((response) => {
            this.loading = false;
            this.items = this.items.filter((item) => item.id !== val.id);
            Notification.success(response.data.message);
          })
          .catch((errors) => {
            this.loading = false;
            Notification.error(errors.response.data.message);
          });
      }
    },
  },
});
</script>
