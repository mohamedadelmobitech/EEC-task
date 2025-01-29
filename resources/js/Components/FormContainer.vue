<template>
    <div class="container mx-auto px-10 bg-white p-10 rounded-lg" >
        <h2 class="font-semibold text-center">{{ title }}</h2>
            <slot name="form"/>
       </div>
</template>
<script setup>
    const props = defineProps({
        title: {
            type: String,
            required: true,
        }, 
    })
</script>