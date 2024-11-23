<template>
  <form-wrapper
    entity-type-name="User"
    section-name="User Management"
    :listing-route="{ name: 'users' }"
    :form="form"
    :save="() => save('users', props.id, form, true)"
    :load="loadUser"
  >
    <user-form-section :form="form" />
    <!-- <role-selection-section :form="form" :roles="roles" /> -->
    <!-- <permission-selection-section :form="form" :permissions="permissions" /> -->
  </form-wrapper>
</template>
<script setup>
import { get, save } from "src/utils/resources";
import { onMounted, reactive, ref } from "vue";
import UserFormSection from "./UserFormSection.vue";
import RoleSelectionSection from "./RoleSelectionSection.vue";
import PermissionSelectionSection from "./PermissionSelectionSection.vue";

const props = defineProps({ id: [String, Number] });
const form = reactive({});

// const roles = ref([]);
// const permissions = ref([]);

// onMounted(() => loadAuthorization());
// async function loadAuthorization() {
//   const [rolesData, permissionsData] = await Promise.all([
//     get("roles"),
//     get("permissions"),
//   ]);

//   roles.value = rolesData.data;
//   permissions.value = permissionsData.data;
// }

const loadUser = async () => {
  if (props.id) Object.assign(form, await get(`users/${props.id}`));
};
</script>
