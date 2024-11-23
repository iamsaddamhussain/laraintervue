<template>
  <q-layout view="lHh Lpr lFf">
    <div>
      <top-bar />
      <side-bar />
      <q-page-container>
        <div class="q-px-md q-pb-xl" style="overflow: hidden">
          <page-title />
          <router-view #default="{ Component }">
            <page-transition>
              <component :is="Component" />
            </page-transition>
          </router-view>
        </div>
      </q-page-container>
    </div>
    <!-- <div v-else>
      <q-page-container>
        <router-view />
      </q-page-container>
    </div> -->
  </q-layout>
</template>

<script setup>
import { useAuthStore } from "../stores/authStore";
import PageTitle from "./common/PageTitle.vue";
import PageTransition from "./common/PageTransition.vue";
import SideBar from "./sidebar/SideBar.vue";
import TopBar from "./topbar/TopBar.vue";

const authStore = useAuthStore();
</script>
