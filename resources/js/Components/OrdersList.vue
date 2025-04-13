<script setup>
import { formatDateTime } from '@/helper';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps(['order'])
</script>
<template>
    <Link class="block" :href="route('order',{order:props.order})">
    <div class="mx-5 flex items-center justify-between rounded-xl bg-secondaryAlt p-3 hover:opacity-50">
        <div class="flex items-center gap-2 text-sm">
            <Icon
                icon="basil:book-outline"
                class="text-secondary"
                width="35"
                height="35"
            />
            <div>
                <p class="font-semibold capitalize">OrderId:{{ order.id }}</p>
                <p class="text-xs text-secondary">{{ formatDateTime(order.created_at)}}</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <p class="text-green-500">₹{{ order.amount }}</p>
            <Icon
                icon="weui:arrow-filled"
                class="font-thin"
                width="24"
                height="30"
            />
        </div>
    </div>
    </Link>
</template>
