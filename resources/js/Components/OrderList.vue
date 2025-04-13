<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps(['order'])
</script>
<template>
    <Link :href="route('admin.order',{order:props.order})" class="block"> 
    <div class="flex items-center justify-between rounded-2xl bg-secondaryAlt p-3">
                <div class="flex items-center gap-2 ">
                    <div
                        class="grid size-10 place-items-center rounded-full border bg-white opacity-80"
                    >
                        <Icon
                            class="text-secondary"
                            icon="solar:box-broken"
                            width="30"
                            height="30"
                        />
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">ID-{{ order.id }}</p>
                        <p class="text-blue-500 rounded-lg capitalize">{{ order.order_status??'Not updated' }}</p>
                    </div>
                </div>

                <div
                    class="grid  place-items-center rounded-full bg-background "
                >
                ₹{{ order.amount }}
                </div>
            </div>
        </Link>
</template>