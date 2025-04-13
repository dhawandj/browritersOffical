<script setup>
import { Icon } from '@iconify/vue';
defineProps(['icon','label'])
</script>
<template>
    <button class="rounded-2xl border bg-white p-3 text-secondaryAlt">
        <Icon :icon="icon" width="40" height="40" />
    </button>
    <p class="mt-1 text-xs font-semibold text-center">{{ label }}</p>
</template>
