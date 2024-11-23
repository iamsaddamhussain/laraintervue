<template>
  <page-wrapper> </page-wrapper>
</template>
<script setup>
import { useAppStore } from "src/stores/appStore";

const appStore = useAppStore();
appStore.setPageInfo({
  title: "Profile",
  section: "Profile Management",
});
</script>
