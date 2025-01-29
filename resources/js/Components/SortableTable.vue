<template>
    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
        <table class="w-full whitespace-no-wrap" :dir="$page.props.lang == 'ar' ? 'rtl' : 'ltr'">
            <thead>
                <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                    <slot name="header"/>
                </tr>
            </thead>
            <tbody>
                <slot name="body"/>
            </tbody>
        </table>
    </div>
</template>
<script setup>
</script>