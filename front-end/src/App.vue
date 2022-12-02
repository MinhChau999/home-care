<template>
  <component :is="layout">
    <router-view />
  </component>
</template>

<script lang="ts">
import { computed } from "vue";
import { useRoute } from "vue-router";

// import {PUBLIC_LAYOUT} from '@/constants';

export default {
  setup() {
    const route = useRoute();
    return {
      layout: computed(() => route.meta.layout + "-layout"),
    };
  },
};
</script>
