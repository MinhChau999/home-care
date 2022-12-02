<template>
  <EasyDataTable
    buttons-pagination
    :headers="headers"
    :items="items"
    table-class-name="customize-table"
    :sort-by="sortBy"
    :sort-type="sortType"
    multi-sort
  />
</template>

<script lang="ts">
import type { Header, Item, SortType } from "vue3-easy-data-table";

export default {
  data() {
    const sortBy: string[] = ["number", "weight"];
    const sortType: SortType[] = ["desc", "asc"];

    const headers: Header[] = [
      { text: "PLAYER", value: "player" },
      { text: "TEAM", value: "team" },
      { text: "NUMBER", value: "number", sortable: true },
      { text: "POSITION", value: "position" },
      { text: "HEIGHT", value: "height" },
      { text: "WEIGHT (lbs)", value: "weight", sortable: true },
      { text: "LAST ATTENDED", value: "lastAttended" },
      { text: "COUNTRY", value: "country" },
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
    ];
    return {
      sortBy,
      sortType,
      items,
      headers,
    };
  },
};
</script>

<style>
.customize-table {
  --easy-table-border: 1px solid #445269;
  --easy-table-row-border: 1px solid #445269;
  --easy-table-header-font-size: 14px;
  --easy-table-header-height: 50px;
  --easy-table-header-font-color: #c1cad4;
  --easy-table-header-background-color: #2d3a4f;
  --easy-table-header-item-padding: 10px 15px;
  --easy-table-body-even-row-font-color: #fff;
  --easy-table-body-even-row-background-color: #4c5d7a;
  --easy-table-body-row-font-color: #c0c7d2;
  --easy-table-body-row-background-color: #2d3a4f;
  --easy-table-body-row-height: 50px;
  --easy-table-body-row-font-size: 14px;
  --easy-table-body-row-hover-font-color: #2d3a4f;
  --easy-table-body-row-hover-background-color: #eee;
  --easy-table-body-item-padding: 10px 15px;
  --easy-table-footer-background-color: #2d3a4f;
  --easy-table-footer-font-color: #c0c7d2;
  --easy-table-footer-font-size: 14px;
  --easy-table-footer-padding: 0px 10px;
  --easy-table-footer-height: 50px;
  --easy-table-rows-per-page-selector-width: 70px;
  --easy-table-rows-per-page-selector-option-padding: 10px;
  --easy-table-scrollbar-track-color: #2d3a4f;
  --easy-table-scrollbar-color: #2d3a4f;
  --easy-table-scrollbar-thumb-color: #4c5d7a;
  --easy-table-scrollbar-corner-color: #2d3a4f;
  --easy-table-loading-mask-background-color: #2d3a4f;
}
</style>
