<template>
  <page-wrapper>
    <div class="row q-col-gutter-xs">
      <div class="col-12 col-md-6 col-xs-3">
        <q-card class="column items-stretch full-height" flat>
          <q-card-section class="full-width text-center no-wrap q-px-none">
            <div>12</div>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </page-wrapper>
</template>

<script setup>
import { useAuthStore } from "src/stores/authStore";
import { useAppStore } from "src/stores/appStore";

const authStore = useAuthStore();
const appStore = useAppStore();
appStore.setPageInfo({
  title: "Dashboard",
});
</script>
