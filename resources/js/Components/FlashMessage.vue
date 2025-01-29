<template>
    <div v-if="$page.props.flash.success && show" class="fixed inset-x-0 top-20 z-50 flex justify-center animate-fade-in-down">
        <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden">
            <div class="flex w-3 bg-gradient-to-t from-default-500 to-default-400"></div>
            <div class="flex-1 p-3">
                <h1 class="md:text-xl text-gray-600">Success</h1>
                <p class="text-gray-400 text-xs md:text-sm font-light">{{ $page.props.flash.success }}</p>
            </div>
            <div class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center" @click="show = false">
                <p class="text-gray-400 text-xs">close</p>
            </div>
        </div>
    </div>

    <div v-if="$page.props.flash.error && show" class="fixed inset-x-0 top-20 z-50 flex justify-center animate-fade-in-down">
        <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden">
            <div class="flex w-3 bg-gradient-to-t from-red-500 to-red-400"></div>
            <div class="flex-1 p-3">
                <h1 class="md:text-xl text-gray-600">Error</h1>
                <p class="text-gray-400 text-xs md:text-sm font-light">{{ $page.props.flash.error }}</p>
            </div>
            <div class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center" @click="show = false">
                <p class="text-gray-400 text-xs">close</p>
            </div>
        </div>
    </div>
    <div v-if="$page.props.flash.warning && show" class="fixed inset-x-0 top-20 z-50 flex justify-center animate-fade-in-down">
        <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden">
            <div class="flex w-3 bg-gradient-to-t from-yellow-500 to-yellow-300"></div>
            <div class="flex-1 p-2">
                <h1 class="md:text-xl text-gray-600">Warning</h1>
                <p class="text-gray-400 text-xs md:text-sm font-light">{{ $page.props.flash.warning }}</p>
            </div>
            <div class="cursor-pointer border-l hover:bg-gray-50 border-gray-100 px-4 flex place-items-center" @click="show = false">
                <p class="text-gray-400 text-xs">close</p>
            </div>
        </div>
    </div>
</template>
<script>
import { watch } from 'vue';

export default{
    data(){
        return {
            show:true
        }
    },
    watch: {
        '$page.props.flash':{
            handler(){
                this.show = true
                setTimeout(()=>{
                    this.show = false
                }, 5000)
            },
            deep: true
        },
    },
}
</script>