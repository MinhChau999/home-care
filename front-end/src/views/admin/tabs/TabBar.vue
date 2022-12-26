<!-- Cái tabbar này chưa biết làm -->

<template>
  <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
    <li class="nav-item">
      <a
        href="#"
        aria-expanded="false"
        class="nav-link rounded-0"
        :class="{ active: activeTab == 0 }"
        @click="activeTab = 0"
      >
        About
      </a>
    </li>
    <li class="nav-item">
      <a
        href="#"
        data-toggle="tab"
        aria-expanded="true"
        class="nav-link rounded-0"
        :class="{ active: activeTab == 1 }"
        @click="activeTab = 1"
      >
        Timeline
      </a>
    </li>
    <li class="nav-item">
      <a
        href="#"
        data-toggle="tab"
        aria-expanded="false"
        class="nav-link rounded-0"
        :class="{ active: activeTab == 2 }"
        @click="activeTab = 2"
      >
        Settings
      </a>
    </li>
  </ul>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  //   props: {
  //     activeTab: Number,
  //   },
  data() {
    return {
      activeTab: 0,
    };
  },
});
</script>
