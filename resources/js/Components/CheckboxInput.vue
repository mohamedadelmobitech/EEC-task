<template>
    <div class="flex items-center h-5">
        <input
            @click="action"
            :id="option.name + option.id ?? ''"
            type="checkbox"
            :checked="modelValue"
            v-model="isChecked"
            @change="updateValue"
            class="w-4 h-4 border border-gray-300 rounded text-default-600 bg-gray-50 focus:ring-3 focus:ring-default-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-default-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 selectAll">
    </div>
    <label :for="option.name + option.id ?? ''" class=" text-sm font-medium text-gray-900 dark:text-gray-300" :class="$page.props.lang == 'ar' ? 'mr-2' : 'ml-2'">
        <!-- {{ $t(`${option.name}`) }} -->
        {{ localeValue(option) && ($t(`filter.${localeValue(option)}`).includes('filter.')
            ? $t(`filter.${localeValue(option)}`).replace('filter.', '')
            : $t(`filter.${localeValue(option)}`)) }}
    </label>
    <!-- $t(`role.${option.name}`) -->
</template>

<script setup>
import { defineEmits, ref } from 'vue'
import { usePage } from "@inertiajs/vue3";
import { trans } from 'laravel-vue-i18n';
    const props = defineProps({
        option: {
            type: Object,
            required: true
        },
        modelValue: {
            required: true,
        },
    })
    const emit = defineEmits(['update:modelValue', 'action'])
    const isChecked = ref(props.value)

    function updateValue(event) {
        isChecked.value = event.target.checked
        emit('update:modelValue', isChecked.value, props.option.id)
    }


    const action = () => {
        emit('action');
    };

const page = usePage();
const localeValue = (item) => {
    const lang = page.props.lang
    if (item.ar_name) {
        return item[`${lang}_name`];
    } else {
        return trans(item.name);
    }
};
</script>