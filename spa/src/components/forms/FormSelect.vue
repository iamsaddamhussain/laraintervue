<template>
  <q-select
    :model-value="selection"
    :options="options"
    :display-value="displayValue"
    :options-label="optionsLabel"
    :multiple="multiple"
    stack-label
    filled
    dense
    hide-bottom-space
    :clearable="!noClear"
    v-bind="$attrs"
    @update:model-value="emitOptionSelection"
  >
    <template v-for="(_, slot) in $slots" #[slot]="scope">
      <slot :name="slot" v-bind="{ ...scope }" />
    </template>
  </q-select>
</template>
<script setup>
import { isNil } from "lodash-es";
import { plural } from "src/utils/formats";
import { computed } from "vue";

const props = defineProps({
  modelValue: null, // an ID, arrau of IDS(if using multiplke prop) or null
  options: Array, // the option to put into the dropdown
  multiple: Boolean, //Allow miltiple selection? Must bind using an array (eg. v-model="users")
  noCLear: Boolean, //prevent null values / no selection state
  placeholder: String,

  //the property of each provided option to use as the display label
  optionsLabel: {
    type: [String],
    default: "name",
  },

  //the property of each provided option to use as the value binding
  optionsValue: {
    type: String,
    default: "id",
  },
});

const emit = defineEmits(["update:model-value"]);

const selection = computed(() => {
  if (isNil(props.modelValue)) return null;
  return props.multiple
    ? props.options.filter((opt) =>
        props.modelValue.includes(opt[props.optionsValue])
      )
    : props.options.find((opt) => opt[props.optionValue] === props.modelValue);
});

const displayValue = computed(() => {
  if (!selection.value || (props.multiple && !props.modelValue.length)) {
    return props.placeholder || "Not Selected";
  }
  return props.multiple
    ? `${selection.value.length} ${plural(
        "item",
        "items",
        selection.value.length
      )} selected`
    : selection.value[props.optionsLabel];
});

function emitOptionSelection(newSelection) {
  if (!newSelection)
    return emit("update:model-value", props.multiple ? [] : null);
  let newVal = props.multiple
    ? newSelection.map((obj) => obj[props.optionsValue])
    : newSelection[props.optionsValue];

  emit("update:model-value", newVal);
}
</script>
