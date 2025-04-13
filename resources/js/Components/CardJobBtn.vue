<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div
        class="borde grid h-32 w-36 place-items-center rounded-3xl bg-secondaryAlt"
    >
        <Link :href="route('jobs')" class="block">
            <div class="flex flex-col justify-center items-center gap-2">
                <Icon icon="entypo:new" width="30" height="30" />
                <p class="font-semibold">Writing Jobs</p>
                <p class="text-secondary">part/full Time</p>
            </div>
        </Link>
    </div>
</template>
