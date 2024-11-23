<template>
  <serverside-lookup
    :model-value="modelValue"
    placeholder="Any Role"
    :query-callback="(term) => get('search/role', { term })"
    @update:model-value="emit('update:model-value', $event)"
    @id="emit('id', $event)"
  />
</template>
<script setup>
import ServersideLookup from "./ServersideLookup.vue";
import { get } from "../../utils/resources";

const props = defineProps({
  modelValue: null, //selected role (Role Object)
});
const emit = defineEmits(["update:model-value", "id"]);
</script>
