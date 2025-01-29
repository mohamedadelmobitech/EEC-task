<template>
    <div class="mb-6">
        <label :for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            <slot/>
            <ValidationNote v-show="required"> *</ValidationNote>
        </label>
        <div class="flex relative">
        <input
            :type="type"
            :id="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-default-500 focus:border-default-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-default-500 dark:focus:border-default-500 dark:shadow-sm-light"
            :class="{'border-red-400': $attrs.error}"
            :placeholder="required && !modelValue ? 'required'+ (info ? ' , '+info: '') : info ? info : ''"
            :required="required"
            :maxlength="max"
            :disabled="isDisabled"
        >
        <a class="pt-2 text-blue-600 cursor-pointer hover:underline absolute  mt-1 " :class="$page.props.lang == 'ar' ? 'left-0 top-0 ml-2' : 'top-0 right-0 mr-2'" v-if="type=='password'" @click="togglePass">
            <!-- <Eye class="w-5 h-5 -mr-1 text-white-400" aria-hidden="true" /> -->
            <svg v-if="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
              </svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
              </svg>


        </a>
        </div>
        <!-- <span v-if="info" class="text-gray-500">{{info}}</span> -->
        <!-- <span v-if="$attrs.error" class="text-sm text-red-400">{{ $attrs.error }}</span> -->
    </div>
</template>

<script setup>
import ValidationNote from './ValidationNote.vue';
import {watch} from 'vue';
import { ref } from 'vue';

    const props = defineProps({
        name: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            default: 'text',
        },
        max: {
            type: Number,
            default: 255
        },
        required: {
            default: true
        },
        modelValue: {
            type: [String, Number],
        },
        isDisabled: {
            default:false
        },
        info: {
            type: String,
            default: false
        }
    })
    watch(() => props.modelValue, (newValue) => {
        if (props.type === 'number' && newValue === '') {
            emit('update:modelValue', '');
        }
    });
    const emit = defineEmits(['update:modelValue'])
    const icon = ref(false);
    const togglePass = () => {
    const input = document.getElementById(props.name);
    if (input.type === 'password') {

        input.type = 'text';
        icon.value = true;
    } else {
        input.type = 'password';
        icon.value = false;
    }
}
</script>
