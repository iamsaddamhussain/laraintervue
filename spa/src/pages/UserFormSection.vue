<template>
  <form-section
    icon="group_add"
    title="Basic Details"
    subtitle="Enter the required info"
  >
    <form-row label="Name" required>
      <form-input type="text" v-model="form.name" placeholder="Enter Name" />
    </form-row>
    <form-row label="Email" required>
      <form-input type="email" v-model="form.email" placeholder="Enter Email" />
    </form-row>
    <form-row label="Password" required>
      <form-input
        type="password"
        v-model="form.password"
        placeholder="Enter Password"
      />
    </form-row>
    <form-row label="Confirm Password" required>
      <form-input
        type="password"
        v-model="form.confirm_password"
        placeholder="Enter Password Confirmation"
      />
    </form-row>
    <form-row label="Role">
      <role-list-lookup v-model="form.role" dense class="col-md-6" />
    </form-row>
  </form-section>
</template>

<script setup>
import RoleListLookup from "src/components/lookups/RoleListLookup.vue";

defineProps({ form: Object });
</script>
