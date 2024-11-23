<template>
  <form-section
    icon="inventory"
    title="Basic Details"
    subtitle="Enter the required info"
  >
    <form-row label="Name" required>
      <form-input type="text" v-model="form.name" placeholder="Create Name" />
    </form-row>
    <form-row label="Permission" required>
      <div
        v-for="(permission, permissionKey) in permissions"
        :key="permissionKey"
        class="row inline"
      >
        {{ form.permissions[permissionKey] }}
        <!-- {{ form.permissions[permissionKey] }} -->
        <form-input
          type="checkbox"
          v-model="form.permissions[permissionKey]"
          name="permission"
          :val="form.permissions[permissionKey]"
          :label="permission.name"
        />
      </div>
    </form-row>
  </form-section>
</template>

<script setup>
defineProps({ form: Object, permissions: Array });
</script>
