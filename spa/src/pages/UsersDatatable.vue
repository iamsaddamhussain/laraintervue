<template>
  <datatable v-bind="tableProps" no-auto-focus class="q-mb-md">
    <template #column-name="{ value }">
      {{ value }}
    </template>
    <template #column-user_type="{ value }">
      <badge> {{ userTypes[value] }} </badge>
    </template>
    <template #column-actions="{ row }">
      <action-renderer
        :row="row"
        :edit="(row) => ({ name: 'edit_user', params: { id: row.id } })"
      />
    </template>
  </datatable>
</template>

<script setup>
import Datatable from "components/datatables/Datatable.vue";
import Badge from "../components/badge/Badge.vue";
import { userTypes } from "../utils/const";
import ActionRenderer from "src/components/datatables/renderers/ActionRenderer.vue";
import {
  column,
  actionsColumn,
} from "src/components/datatables/datatableColumnBuilder.js";
const tableProps = {
  url: "users",
  paginationDefaults: {
    sort_by: "updated_at",
    descending: true,
  },
  columns: [
    column("name"),
    column("email"),
    column("user_type").setUnsortable(),
    actionsColumn(),
  ],
};
</script>
