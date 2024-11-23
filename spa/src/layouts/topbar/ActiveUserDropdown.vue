<template>
  <q-btn-dropdown
    :label="authStore.user.user.name"
    stretch
    flat
    no-caps
    icon="account_circle"
  >
    <q-list>
      <q-item to="profile" clickable>
        <q-item-section>My Profile</q-item-section>
      </q-item>
      <q-item clickable @click="logout">
        <q-item-section> Logout </q-item-section>
      </q-item>
    </q-list>
  </q-btn-dropdown>
</template>

<script setup>
import { useRouter } from "vue-router";
import { useAuthStore } from "../../stores/authStore";
const authStore = useAuthStore();
const router = useRouter();

const logout = async () => {
  await authStore.logout().then(() => router.push({ name: "login" }));
};
</script>
