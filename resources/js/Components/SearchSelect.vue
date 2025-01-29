<template>
    <select   ref="dropdown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-default-500 focus:border-default-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-default-500 dark:focus:border-default-500 dark:shadow-sm-light"
        data-te-select-init data-te-select-filter="true" @change="updateOption" multiple v-model="isSelected">
        <option :value="0" v-if="acceptAll">All</option>
        <option value="other" v-if="acceptOther" key="other">Other</option>
        <option :value="0" v-if="!acceptAll && acceptNone">None</option>
        <option v-for="option in options" :key="option.id" :value="option.id" :selected="option.id === isSelected">{{ option.name }}</option>
    </select>
</template>
<script setup>
import { Select, initTE } from "tw-elements";
import { ref } from "vue";
import { onMounted } from "vue";
import { watch } from 'vue';

document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.querySelector('select');

    dropdown.addEventListener('change', () => {
      // Keep the dropdown open
      setTimeout(() => {
        dropdown.focus();
      }, 0);
    });
  });
  
onMounted(()=>{
    initTE({ Select });
})

const props = defineProps({
    options: {
        required:true,
        type:Object
    },
    modelValue: {
        required: true,
    },
    acceptAll: {
        default: true
    },
    acceptNone: {
        default: true
    },
    acceptOther: {
        default: false
    },
    lang: {
        type: String
    }
});

watch(
    () => props.modelValue,
    (newValue, oldValue) => {
        isSelected.value = newValue
    }
)


const emit = defineEmits(['update:modelValue', 'action'])

const isSelected = !props.modelValue ? ref(0) : ref(props.modelValue)

function updateOption(event) {
    emit('update:modelValue', event.target.value, isSelected)
    action(props.options.filter(option => option.id == event.target.value))
}

const action = (event) => {
    emit('action', event);
};

const localeValue = (item) => {
    const lang = props.lang;
    if (item.ar_name) {
        return item[`${lang}_name`];
    } else if (item.name[lang]) {
        return item.name[lang];
    } else if (item[`${lang}_title`]) {
        return item[`${lang}_title`];
    } else {
        return item.name
    }
};

</script>
