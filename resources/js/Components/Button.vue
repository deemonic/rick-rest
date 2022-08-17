<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="shadow-2xl inline-flex items-center px-4 py-2 bg-lime-400 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-lime-500 active:bg-lime-900 focus:outline-none focus:border-lime-400 focus:shadow-outline-lime-400 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
