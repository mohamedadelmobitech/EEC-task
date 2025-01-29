<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,useForm} from '@inertiajs/vue3';
import 'vue-multiselect/dist/vue-multiselect.css';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>
        

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                You Are Logged In!
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>



<style>
.multiselect__content-wrapper{
    max-height: 200px !important;
   
}

</style>