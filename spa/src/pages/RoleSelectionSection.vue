<template>
  <form-row label="Role">
    <!-- <div v-for="(role, roleKey) in roles" :key="roleKey" class="row inline">
        <form-input
          type="checkbox"
          v-model="form.roles"
          name="role"
          :val="role.name"
          :label="role.name"
        />
      </div> -->
    <role-list-lookup v-model="selectedRole" dense class="col-md-6" />
  </form-row>
</template>

<script setup>
import RoleListLookup from "src/components/lookups/RoleListLookup.vue";
import { ref } from "vue";
const props = defineProps({ form: Object, roles: Array });

const selectedRole = ref(null);
</script>
