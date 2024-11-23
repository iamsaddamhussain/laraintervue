<template>
  <form-wrapper
    entity-type-name="Permission"
    section-name="Permission Management"
    :listing-route="{ name: 'permissions' }"
    :form="form"
    :save="savePermission"
    :load="loadPermission"
  >
    <permission-form-section :form="form" />
  </form-wrapper>
</template>
<script setup>
import { attachToFormData } from "src/utils/misc";
import { save } from "src/utils/resources";
import { reactive } from "vue";
import { get } from "../utils/resources";
import PermissionFormSection from "./PermissionFormSection.vue";

const props = defineProps({ id: [String, Number] });
const form = reactive({});

const savePermission = async () => {
  const res = await save(
    "permissions",
    props.id,
    attachToFormData({
      ...form,
    }),
    true
  );
  return res;
};

const loadPermission = async () => {
  if (props.id) Object.assign(form, await get(`permissions/${props.id}`));
};
</script>
