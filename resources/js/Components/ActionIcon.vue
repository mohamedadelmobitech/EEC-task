<template>


    <button v-if="action == 'delete'" class="inline-table" @click.prevent="$emit('actionMethod')">
        <VTooltip>
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                </path>
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </button>
    <button v-if="action == 'feature'" class="inline-table" @click.prevent="$emit('actionMethod')">
        <VTooltip>
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </button>
    <button v-if="action == 'not_feature'" class="inline-table" @click.prevent="$emit('actionMethod')">
        <VTooltip>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </button>
    <a v-if="action == 'edit'" class="inline-table" :href="anchor">
        <VTooltip>
            <svg class="w-5 h-5 text-default-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                </path>
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </a>
    <a v-if="action == 'reset'" class="inline-table " :href="anchor">

        <VTooltip>
            <svg class="w-5 h-5 mx-6 text-default-700" fill="none" stroke="currentColor" viewBox="0 0 16 16"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m3.98652376 1.07807068c-2.38377179 1.38514556-3.98652376 3.96636605-3.98652376 6.92192932 0 4.418278 3.581722 8 8 8s8-3.581722 8-8-3.581722-8-8-8">
                </path>
                <path d="m4 1v4h-4" transform="matrix(1 0 0 -1 0 6)"></path>
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </a>
    <a v-if="action == 'show'" class="inline-table" :href="anchor">
        <VTooltip>
            <svg class="w-5 h-5 text-default-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </a>
    <button v-if="action == 'update'" class="inline-table" @click.prevent="$emit('actionMethod')">
        <VTooltip>
            <svg class="w-5 h-5 text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
            </svg>
            <template #popper>
                {{ action }}
            </template>
        </VTooltip>
    </button>
</template>
<script setup>
import { Dropdown, Tooltip, Menu, vTooltip } from 'floating-vue'
import 'floating-vue/dist/style.css'
const props = defineProps({
    anchor: {
        type: String,
        default: '#'
    },
    action: {
        type: String,
        required: true,
    },
})

const emits = defineEmits(['actionMethod'])
</script>
