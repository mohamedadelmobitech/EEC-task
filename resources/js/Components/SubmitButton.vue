<template>
    <button type="submit" class="rounded-md  bg-green-600 px-2 py-2 text-center text-md font-semibold text-white hover:bg-default-500 w-60">
        <slot/>
        <slot name="title" />
        <span class="w-4 ml-2">
            <slot name="icon" />
        </span>
    </button>
</template>
