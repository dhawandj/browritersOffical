<script setup>
import { formatDateTime } from '@/helper';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps(['latestOrder'])

</script>
<template>
    <Link class="hover:opacity-50" :href="route('order',{order:props?.latestOrder[0]})">
    <div class="mx-5 flex min-h-32 flex-col justify-between rounded-2xl bg-secondaryAlt p-5">
        <div class="flex justify-between">
            <Icon icon="basil:book-outline" width="30" height="30" />
            <Icon icon="clarity:new-solid" width="36" height="36" />
        </div>
        <div>
            <div class="flex justify-between">
                <p class="capitalize">{{ latestOrder[0].books[0].category }}</p>
                <p class="text-green-500">₹{{ latestOrder[0].amount }}</p>
            </div>
            <div class="flex justify-between text-sm text-textPrimary">
                <p>OrderId:{{ latestOrder[0].id }}</p>
                <p>{{formatDateTime(latestOrder[0].created_at)}} </p>
            </div>
        </div>
    </div>
</Link>

</template>
