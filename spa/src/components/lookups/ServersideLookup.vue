<!-- Base component in which all other serverside lookups / ajax typeaheads can use as a base -->
<template>
  <q-select
    :model-value="modelValue"
    filled
    use-input
    fill-input
    hide-selected
    :options="options"
    option-label="name"
    :option-value="optionValue"
    clearable
    dense
    stack-label
    placeholder="Any"
    @update:model-value="onSelection"
    @clear="emit('id', null)"
    @filter="filterOptions"
  >
    <template #option="scope">
      <q-item v-bind="scope.itemProps">
        <slot :option="scope.opt">
          <q-item-section>
            <q-item-label>
              {{ scope.opt.name }}
            </q-item-label>
            <q-item-label caption>
              {{ scope.opt.email }}
            </q-item-label>
          </q-item-section>
        </slot>
      </q-item>
    </template>

    <template #no-option>
      <q-item>
        <q-item-section class="text-grey"> No results found </q-item-section>
      </q-item>
    </template>
  </q-select>
</template>

<script setup>
import { ref } from "vue";

const props = defineProps({
  modelValue: null, // Selected option
  queryCallback: Function, // Perform tne query to get the search results from server (is provided with the search term)
  optionValue: {
    type: String,
    default: "id",
  },
});
const emit = defineEmits(["update:model-value", "id"]);

const options = ref(null);

function onSelection(option) {
  emit("update:model-value", option);
  emit("id", option ? option[props.optionValue] : null);
}

async function filterOptions(val, update) {
  let results = await props.queryCallback(val);

  update(() => (options.value = results));
}
</script>
