<template>
    <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-xs font-semibold uppercase tracking-wider text-gray-600"
    :class="$page.props.lang == 'ar' ? 'text-right' : 'text-left'">
        <slot></slot>
    </th>
</template>