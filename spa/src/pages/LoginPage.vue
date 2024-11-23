<template>
  <q-page class="flex flex-center" v-if="!authStore.isLoggedIn">
    <div class="full-width" style="max-width: 300px">
      <h5 class="q-my-md">Login</h5>
      <q-card>
        <q-form @submit.prevent="login">
          <q-card-section>
            <custom-input
              :model-value="form.email"
              @update:model-value="form.email = $event"
              type="email"
              label="Email"
              placeholder="Enter email address"
              class="q-mb-md"
              filled
            />
            <custom-input
              :model-value="form.password"
              @update:model-value="form.password = $event"
              :type="`password`"
              label="Password"
              placeholder="Enter password"
              class="q-mb-md"
              filled
            />
          </q-card-section>
          <q-btn
            type="submit"
            label="login"
            class="full-width"
            color="primary"
          />
        </q-form>
      </q-card>
    </div>
  </q-page>
</template>

<script setup>
import { ref, reactive } from "vue";
import { useAuthStore } from "src/stores/authStore";
import { useRouter } from "vue-router";
const authStore = useAuthStore();
const router = useRouter();

const isLoading = ref(false);
const form = reactive({});
const login = async () => {
  isLoading.value = true;
  return await authStore
    .login(form)
    .then(() => router.push({ name: "dashboard" }))
    .catch(() => (isLoading.value = false))
    .finally(() => (isLoading.value = false));
};
</script>
