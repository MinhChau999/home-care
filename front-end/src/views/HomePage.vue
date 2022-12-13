<template>
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
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
          <h4 class="page-title">Products</h4>
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
                <a href="javascript:void(0);" class="btn btn-danger mb-2"
                  ><i class="mdi mdi-plus-circle mr-2"></i> Add Products</a
                >
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
              <div class="col-sm-6">
                <div class="form-group col-sm-6">
                  <span class="row">Row per page: </span>
                  <select class="form-control row">
                    <option value="5">5</option>
                    <option value="10">10</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="form-group col-sm-2"></div>
                  <div class="form-group col-sm-4">
                    <span class="row">Field: </span>
                    <select v-model="searchField" class="form-control row">
                      <option value="player">Player</option>
                      <option value="team">Team</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <span class="row">Search: </span>
                    <input
                      class="form-control row"
                      type="text"
                      v-model="searchValue"
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col-->
            <EasyDataTable
              buttons-pagination
              theme-color="#1d90ff"
              v-model:items-selected="itemsSelected"
              table-class-name="customize-table"
              alternating
              show-index
              :search-field="searchField"
              :search-value="searchValue"
              :rows-per-page="5"
              :headers="headers"
              :items="items"
              :loading="loading"
            >
              <template #loading>
                <img
                  src="https://thumbs.gfycat.com/AngelicYellowIberianmole.webp"
                  style="width: 60px; height: 100px"
                />
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
</template>

<script lang="ts">
import excelParser from "@/services/export.service";
import type { Header, Item } from "vue3-easy-data-table";
import { defineComponent } from "vue";
import vClickOutside from "click-outside-vue3";

export default defineComponent({
  directives: {
    clickOutside: vClickOutside.directive,
  },
  data() {
    // const sortBy: string[] = ["number", "weight"];
    // const sortType: SortType[] = ["desc", "asc"];
    const itemsSelected: Item[] = [];
    const viewItem = (val: Item) => {
      console.log(val);
      console.log(itemsSelected);
    };
    const headers: Header[] = [
      { text: "Player", value: "player" },
      { text: "Team", value: "team" },
      { text: "Number", value: "number" },
      { text: "Position", value: "position" },
      { text: "Height", value: "height" },
      { text: "Weight (lbs)", value: "weight" },
      { text: "Last Attend", value: "lastAttended" },
      { text: "Country", value: "country" },
      { text: "Operation", value: "operation" },
    ];

    const items: Item[] = [
      {
        player: "Stephen Curry",
        team: "GSW",
        number: 30,
        position: "G",
        height: "6-2",
        weight: 185,
        lastAttended: "Davidson",
        country: "USA",
      },
      {
        player: "Lebron James",
        team: "LAL",
        number: 6,
        position: "F",
        height: "6-9",
        weight: 250,
        lastAttended: "St. Vincent-St. Mary HS (OH)",
        country: "USA",
      },
      {
        player: "Lebron James II",
        team: "LAL",
        number: 6,
        position: "F",
        height: "6-9",
        weight: 255,
        lastAttended: "St. Vincent-St. Mary HS (OH)",
        country: "USA",
      },
      {
        player: "Kevin Durant",
        team: "BKN",
        number: 7,
        position: "F",
        height: "6-10",
        weight: 240,
        lastAttended: "Texas-Austin",
        country: "USA",
      },
      {
        player: "Kevin Durant II",
        team: "BKN",
        number: 7,
        position: "F",
        height: "6-10",
        weight: 242,
        lastAttended: "Texas-Austin",
        country: "USA",
      },
      {
        player: "Giannis Antetokounmpo",
        team: "MIL",
        number: 34,
        position: "F",
        height: "6-11",
        weight: 242,
        lastAttended: "Filathlitikos",
        country: "Greece",
      },
      {
        player: "Kevin Durant II",
        team: "BKN",
        number: 7,
        position: "F",
        height: "6-10",
        weight: 242,
        lastAttended: "Texas-Austin",
        country: "USA",
      },
      {
        player: "Giannis Antetokounmpo",
        team: "MIL",
        number: 34,
        position: "F",
        height: "6-11",
        weight: 242,
        lastAttended: "Filathlitikos",
        country: "Greece",
      },
      {
        player: "Kevin Durant II",
        team: "BKN",
        number: 7,
        position: "F",
        height: "6-10",
        weight: 242,
        lastAttended: "Texas-Austin",
        country: "USA",
      },
      {
        player: "Giannis Antetokounmpo",
        team: "MIL",
        number: 34,
        position: "F",
        height: "6-11",
        weight: 242,
        lastAttended: "Filathlitikos",
        country: "Greece",
      },
      {
        player: "Kevin Durant II",
        team: "BKN",
        number: 7,
        position: "F",
        height: "6-10",
        weight: 242,
        lastAttended: "Texas-Austin",
        country: "USA",
      },
      {
        player: "Giannis Antetokounmpo",
        team: "MIL",
        number: 34,
        position: "F",
        height: "6-11",
        weight: 242,
        lastAttended: "Filathlitikos",
        country: "Greece",
      },
    ];
    return {
      items,
      headers,
      searchField: "player",
      searchValue: "",
      itemsSelected,
      loading: false,
      viewItem,
      showExport: false,
    };
  },
  methods: {
    onClickOutside() {
      if (this.showExport == true) {
        this.showExport = false;
      }
    },
    editItem(item: Item[]): void {
      console.log(item);
    },
    deleteItem(item: Item[]) {
      console.log(item);
    },
    exportData(type: string) {
      excelParser.exportDataFromJSON(this.items, "users", type);
    },
  },
});
</script>
