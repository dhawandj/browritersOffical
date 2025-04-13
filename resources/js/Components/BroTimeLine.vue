<script setup>
import { formatDateTime } from '@/helper';
import { Icon } from '@iconify/vue';
import { computed, ref } from 'vue';
const props = defineProps(['order']);

// Your available statuses in order
const statuses = ["ordered", "picked","writing", "delivery","completed"];

// Current order status (you can change this dynamically)
const currentStatus = ref(props.order.order_status??'ordered');

// Function to check if a status is completed
const isCompleted = (status) => statuses.indexOf(status) <= statuses.indexOf(currentStatus.value);

const events = ref([
    {
        completed: isCompleted('ordered'),
        status: 'Ordered',
        date: '15/10/2020 10:30',
        icon: 'solar:box-broken',
        color: '#9C27B0',
        desc: `OrderId #${props.order.id} ${formatDateTime(props.order.created_at)}`,
    },
    {
        completed: isCompleted('picked'),
        status: 'Ready to Book Pickup',
        date: '15/10/2020 14:00',
        icon: 'icon-park-outline:delivery',
        color: '#673AB7',
        desc: 'Available between 9 AM and 10 PM Today',
    },
    {
        completed: isCompleted('writing'),
        status: 'Book Writing',
        date: '15/10/2020 16:15',
        icon: 'fluent-emoji-high-contrast:writing-hand',
        color: '#FF9800',
        desc: isCompleted('writing')?'Your books is currently in  writing process':'Tracking details will be updated shortly',
    },
    {
        completed: isCompleted('delivery'),
        status: 'Out for Delivery',
        date: '16/10/2020 10:00',
        icon: 'ic:baseline-delivery-dining',
        color: '#607D8B',
        desc: isCompleted('delivery')?'Your order is on its way! Available between 9 AM and 10 PM today':'Updated shortly',
    },
    {
        completed: isCompleted('completed'),
        status: 'Order Completed',
        date: '15/10/2020 16:15',
        icon: 'fluent-mdl2:completed-solid',
        color: '#FF9800',
        desc: 'Thank you for choosing our service!',
    },
]);
// Find the latest completed status
const latestCompletedIndex = computed(() => {
    return events.value.map(e => e.completed).lastIndexOf(true);
});
</script>
<template>
    <div v-for="(e,index) in events" class="flex gap-3">
        <div class="flex flex-col items-center justify-start">
            <div class="relative size-5 rounded-full border-2" :class="{ 'border-green-200 bg-green-500': e.completed }"> 
                <!-- rounded -->
                <div 
                    v-if="e.completed && index === latestCompletedIndex"
                    class="w-full h-full bg-green-300 rounded-full animate-ping"
                ></div>
            </div>
            <div
                class="h-14 w-min border border-dashed"
                :class="{ hidden: e.status === 'Order Completed' }"
            >
                <!-- line -->
            </div>
        </div>

        <div class="flex items-start gap-2">
            <Icon
                class="text-secondary"
                :icon="e.icon"
                width="30"
                height="30"
            />
            <div>
                <p class="text-sm font-semibold">{{ e.status }}</p>
                <p class="text-sm text-textPrimary">
                    {{e.desc}}
                </p>
            </div>
        </div>
    </div>
</template>
