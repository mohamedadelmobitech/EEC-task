<template>
    <form @submit.prevent="submits" :dir="$page.props.lang == 'ar' ? 'rtl' : ''">
        <slot name="inputs"/>
        <slot name="submitButton"/>
        
    </form>
</template>
<script setup>
    const emit = defineEmits(['submit_data'])
    const submits = ()=>{
        emit('submit_data')
    }
</script>