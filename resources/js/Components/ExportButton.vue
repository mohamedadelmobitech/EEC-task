<template>
    <button
        class="flex items-center rounded whitespace-nowrap bg-red-900 px-4 pb-[5px] pt-[6px] text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-bg-default-800 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-bg-default-800 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-bg-default-900 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none"
        :class="lang == 'ar' ? 'flex-row-reverse' : ''"
        type="button"
        :id="name"
        >
        <Link class="inline-table" :href="anchor??''" as="button" type="button" :data="data" @click.prevent="$emit('action')">Export Records &nbsp;</Link>
        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="16 16 12 12 8 16" />  <line x1="12" y1="12" x2="12" y2="21" />
            <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3" />
            <polyline points="16 16 12 12 8 16" />
        </svg>
    </button>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    name: {
        type: String,
        default: 'export',
    },
    anchor: {
        required: false
    },
    data: {
        required: false
    }
});
const emits = defineEmits(['action'])
</script>