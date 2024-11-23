<template>
  <form-section icon="not_accessible" title="Permission">
    <form-row label="Permission">
      <div
        v-for="(permission, permissionKey) in permissions"
        :key="permissionKey"
        class="row inline"
      >
        <form-input
          type="checkbox"
          v-model="form.permissions"
          name="permission"
          :val="permission.name"
          :label="permission.name"
        />
      </div>
    </form-row>
  </form-section>
</template>

<script setup>
const props = defineProps({ form: Object, permissions: Array });
</script>
