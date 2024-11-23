<template>
  <form-wrapper
    entity-type-name="Role"
    section-name="Role Management"
    :listing-route="{ name: 'roles' }"
    :form="form"
    :save="() => save('roles', props.id, form, true)"
    :load="loadRole"
  >
    <role-form-section :form="form" :permissions="permissions" />
  </form-wrapper>
</template>
<script setup>
import { get, save } from "src/utils/resources";
import { onMounted, reactive, ref } from "vue";
import RoleFormSection from "./RoleFormSection.vue";

const props = defineProps({ id: [String, Number] });
const form = reactive({
  permissions: ref([]),
});

const loadRole = async () => {
  if (props.id) Object.assign(form, await get(`roles/${props.id}`));
};

let permissions = reactive([]);

onMounted(() => loadPermission());
async function loadPermission() {
  const { data } = await get("permissions");
  permissions.push(...data);
  return permissions;
}
</script>
