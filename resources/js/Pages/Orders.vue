<script setup>
import LatestOrderCard from '@/Components/LatestOrderCard.vue';
import MyFooter from '@/Components/MyFooter.vue';
import OrdersList from '@/Components/OrdersList.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['latestOrder', 'orders']);
</script>

<template>
    <Head title="Orders" />

    <div class="flex min-h-screen flex-col bg-background text-white">
        <!-- nav bar -->
        <nav class="sticky top-0 mb-5 z-10 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Bro Orders</p>
        </nav>

        <!-- main content -->
        <main class="flex-grow space-y-10 pb-20">
            <!-- latest order -->
            <div v-if="latestOrder[0]" class="max-w-xl mx-auto">
                <LatestOrderCard :latestOrder="latestOrder" />
            </div>

            <!-- list of orders | old orders list -->
            <div v-if="latestOrder[0]" class="space-y-5 max-w-xl mx-auto">
                <OrdersList
                    v-for="order in orders"
                    :key="order.id"
                    :order="order"
                />
            </div>

            <!-- no orders message -->
            <div v-else class="mx-5">
                <p
                    class="p-4 rounded-2xl bg-secondaryAlt text-center capitalize underline underline-offset-2 font-semibold"
                >
                    no orders yet made
                </p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full bg-secondaryAlt p-1">
            <MyFooter />
        </footer>
    </div>
</template>
