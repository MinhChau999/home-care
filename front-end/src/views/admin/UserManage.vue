<template>
  <div class="user-manage">
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
          <h4 class="page-title">Users</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-sm-4">
                <router-link
                  :to="{ name: 'user-create' }"
                  class="btn btn-danger mb-2"
                  ><i class="mdi mdi-plus-circle mr-2"></i> Add User
                </router-link>
              </div>
              <div class="col-sm-8">
                <div class="text-sm-right">
                  <button type="button" class="btn btn-success mb-2 mr-1">
                    <i class="mdi mdi-settings"></i>
                  </button>
                  <button type="button" class="btn btn-light mb-2 mr-1">
                    Import
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
            <div class="row mb-1">
              <div class="col-sm-12 col-md-5 row">
                <div class="form-group col-sm-8">
                  <span>Rows per page: </span>
                  <div class="customize-rows-per-page">
                    <select
                      class="select-items form-control col-sm-9"
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
              </div>
              <div class="col-sm-12 col-md-7 row">
                <div class="col-sm-4"></div>
                <div class="form-group col-sm-3">
                  <span>Field: </span>
                  <select v-model="searchField" class="form-control">
                    <option
                      v-for="item in searchName"
                      v-bind:key="item"
                      v-bind:value="item"
                    >
                      {{ item.charAt(0).toUpperCase() + item.slice(1) }}
                    </option>
                  </select>
                </div>
                <div class="form-group col-sm-5">
                  <span>Search: </span>
                  <input
                    class="form-control"
                    type="text"
                    v-model="searchValue"
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
              <template #item-name="{ name, avatar }">
                <div class="table-user">
                  <img :src="avatar" class="mr-2 rounded-circle" />
                  <a href="javascript:void(0);" class="text-dark">{{ name }}</a>
                </div>
              </template>
              <template #item-email="{ email }">
                <a class="text-dark" href="mailto:{{email}}">{{ email }}</a>
              </template>
              <template #item-phone="{ phone }">
                <a class="text-dark" href="tel:{{phone}}">{{ phone }}</a>
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
                    @click="viewItem(item)"
                    href="javascript:void(0);"
                    class="action-icon"
                  >
                    <i class="mdi mdi-eye"></i
                  ></a>
                  <a
                    @click="editItem(item)"
                    href="javascript:void(0);"
                    class="action-icon"
                  >
                    <i class="mdi mdi-square-edit-outline"></i
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
                  Showing users
                  {{ currentPageFirstIndex }} to {{ currentPageLastIndex }} of
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
  </div>
  <!-- End Content -->
</template>

<script lang="ts">
import type { Header, Item } from "vue3-easy-data-table";
import { defineComponent } from "vue";
import UserService from "@/services/user.service";
import ExcelParser from "@/services/export.service";
import Notification from "@/services/notification.service";
import vClickOutside from "click-outside-vue3";

export default defineComponent({
  directives: {
    clickOutside: vClickOutside.directive,
  },
  data() {
    // const sortBy: string[] = ["number", "weight"];
    // const sortType: SortType[] = ["desc", "asc"];

    const itemsSelected: Item[] = [];
    const headers: Header[] = [
      // { text: "#", value: "id" },
      { text: "Name", value: "name", sortable: true, width: 160 },
      { text: "Email", value: "email", width: 200 },
      { text: "Phone", value: "phone", width: 160 },
      { text: "Gender", value: "gender" },
      { text: "Birthday", value: "birthday", width: 130 },
      { text: "Role", value: "role" },
      { text: "Operation", value: "operation" },
    ];

    const searchName = ["name", "email", "phone", "birthday", "role"];

    const items: Item[] = [];
    // index related
    const from = 1;
    const to = 5;

    return {
      items,
      headers,
      searchField: "name",
      searchValue: "",
      searchName,
      itemsSelected,
      loading: false,
      linkLimitPage: 5,
      from,
      to,
      showExport: false,
    };
  },
  async mounted() {
    await this.getAllUser();
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
    getAllUser() {
      this.loading = true;
      UserService.getAllUser()
        .then((response: any) => {
          this.items = response.data.data;
          for (var i in this.items) {
            this.items[i].gender = this.items[i].gender == 1 ? "Nam" : "Nữ";
          }
          this.itemsSelected = [];
          this.loading = false;
          // Notification.success(response.data.message);
        })
        .catch(() => {
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
    viewItem(item: Item[]): void {
      console.log(item);
      console.log(this.$store.state.authAdmin.admin);
    },
    onClickOutside() {
      if (this.showExport == true) {
        this.showExport = false;
      }
    },
    exportData(type: string) {
      ExcelParser.exportDataFromJSON(this.items, "users", type);
    },
    editItem(item: Item[]): void {
      console.log(item);
    },
    deleteItem(val: any) {
      if (confirm("Do you really want to delete?")) {
        const id: any = this.$store.state.authAdmin.admin.id;
        const role: any = this.$store.state.authAdmin.admin.role;
        if (id == val.id) {
          Notification.error("Xóa thất bại");
          return false;
        }
        if (role != 0) {
          Notification.error("Xóa thất bại");
          return false;
        }
        this.items = this.items.filter((item) => item.id !== val.id);
        UserService.deleteUser(val.id)
          .then((response: any) => {
            console.log(response.data.message);
          })
          .catch(() => {
            Notification.error("Xóa thất bại");
          });
      }
    },
  },
});
</script>
