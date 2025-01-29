<template>
    <label :for="refFor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        <slot/>
    </label>
</template>

<script setup>
defineProps({
    refFor:String
});
</script>