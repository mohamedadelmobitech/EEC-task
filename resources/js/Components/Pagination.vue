<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1" :dir="$page.props.lang === 'ar'? 'rtl':''">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="px-2 py-1 mb-1 mr-1 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <!-- <Link v-else :key="key + 1" class="px-2 py-1 mb-1 mr-1 text-sm leading-4 border rounded hover:bg-default-500 hover:text-white focus:border-default-500 focus:text-default-500" :class="{ 'text-white bg-default-500': link.active }" :href="link.url" v-html="link.label" /> -->
        <Link v-else :key="key + 1"
          class="px-2 py-1 mb-1 mr-1 text-sm leading-4 border rounded hover:bg-default-500 hover:text-white focus:border-default-500 focus:text-default-500"
          :class="{ 'text-white bg-default-500': link.active }" :href="`${link.url}&${queryString.toString()}`"
          v-html="link.label" />



      </template>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
const page = usePage();

const queryString = new URLSearchParams(window.location.search);
queryString.delete('page'); // Remove the 'page' parameter


defineProps({
  links: [Array, Object]
});
</script>
