<script setup>
import { Icon } from '@iconify/vue';
import { Drawer } from 'primevue';
import { ref } from 'vue';
import BroTimeLine from './BroTimeLine.vue';
import { formatDateTime } from '@/helper';
import { Link } from '@inertiajs/vue3';

defineProps(['order'])

const t_viewStatus = ref(false);
const t_options = ref(false);

</script>
<template>
    <div class="mx-5 flex min-h-36 flex-col justify-between gap-3 rounded-2xl bg-secondaryAlt p-5  shadow-xl">
        <div class="flex justify-between">
            <Icon icon="basil:book-outline" width="30" height="30" />
            <Icon
                @click="t_options = true"
                icon="gg:options"
                width="24"
                height="24"
            />
        </div>
        <div>
            <div class="flex justify-between">
                <p class="capitalize">{{ order.books[0].category }}</p>
                <p class="text-green-500">₹{{ order.amount }}</p>
            </div>
            <div class="flex justify-between text-sm text-textPrimary">
                <p>Books : {{ order.books.length }}</p>
            </div>
            <div
                class="flex justify-between text-sm uppercase text-textPrimary"
            >
                <p>OrderId : {{ order.id }}</p>
                <p>{{ formatDateTime(order.created_at) }}</p>
            </div>
        </div>
        <div class="mt-2 border-t border-secondary text-end">
            <button
                @click="t_viewStatus = true"
                class="mt-3 hover:opacity-50 inline-flex items-center gap-2 rounded-lg   bg-white p-1 px-2 text-sm capitalize text-secondaryAlt font-semibold"
            >
                <Icon icon="mdi:clock-outline" width="24" height="24" />
                <p>view status</p>
            </button>
        </div>
    </div>

    <!-- view status drawer -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="t_viewStatus"
        header="Order Status"
        position="bottom"
        style="height: 600px"
    >
        <div class="space-y-5 p-1">
            <!-- timeline comp sectioin -->
            <div>
                <BroTimeLine  :order="order"/>
            </div>
            <!-- browriters phone call section -->
            <a :href="`tel:${$page.props.auth.deliveryBoyNumber}`"  class="flex items-center justify-between rounded-xl bg-secondaryAlt p-3">
                <div class="flex items-center gap-2">
                    <div class="grid size-10 place-items-center rounded-full border bg-textPrimary">
                        <Icon
                            class="text-secondary"
                            icon="mdi:user"
                            width="30"
                            height="30"
                        />
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">browriters</p>
                        <p>{{ $page.props.auth.deliveryBoyNumber }}</p>
                    </div>
                </div>

                <div class="grid size-10 place-items-center rounded-full bg-background">
                    <Icon
                        class="animate-pulse text-secondary"
                        icon="iconamoon:phone-light"
                        width="30"
                        height="30"
                    />
                </div>
            </a>

            <!-- bros address section -->
            <div class="flex items-end gap-2 rounded-xl bg-secondaryAlt p-2">
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <Icon
                            class="text-secondary"
                            icon="material-symbols:home-outline"
                            width="30"
                            height="30"
                        />
                        <div class="text-sm">
                            <p class="font-semibold">Address</p>
                            <p class="text-textPrimary">
                                {{ order.p_address??'please Enter the address' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <Icon
                            class="text-secondary"
                            icon="iconamoon:phone-light"
                            width="30"
                            height="30"
                        />
                        <div class="text-sm">
                            <p class="font-semibold">Phone</p>
                            <p class="text-textPrimary">{{ order.phone??'No number' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Drawer>

    <!-- options drawer -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="t_options"
        header="Options"
        position="bottom"
        style="height: auto"
    >
        <div class="space-y-5">
            <!-- chat option -->
            <a  href="https://wa.me/+918050859436?text=Hi%20for%20BroWriters" target="_blank"  class="flex items-center justify-between rounded-2xl bg-secondaryAlt p-3">
                <div class="flex items-center gap-2">
                    <div
                        class="grid size-10 place-items-center rounded-full border bg-white"
                    >
                        <Icon
                            class="text-secondary"
                            icon="humbleicons:chat"
                            width="30"
                            height="30"
                        />
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">Chat</p>
                        <p class="text-textPrimary">24/7 support</p>
                    </div>
                </div>

                <div
                    class="grid size-10 place-items-center rounded-full bg-background"
                >
                    <Icon
                        class="text-white"
                        icon="weui:arrow-filled"
                        width="30"
                        height="30"
                    />
                </div>
            </a>
            <!-- contact us option -->
             <Link  :href="route('p.index',{comp:'ContactUs'})"  class="flex items-center justify-between rounded-2xl bg-secondaryAlt p-3 hover:opacity-35">
                <div class="flex items-center gap-2">
                    <div
                        class="grid size-10 place-items-center rounded-full border bg-white"
                    >
                        <Icon
                            class="text-secondary"
                            icon="mdi:user"
                            width="30"
                            height="30"
                        />
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">Contact us</p>
                        <p class="text-textPrimary">email,phone</p>
                    </div>
                </div>

                <div
                    class="grid size-10 place-items-center rounded-full bg-background"
                >
                    <Icon
                        class="text-white"
                        icon="weui:arrow-filled"
                        width="30"
                        height="30"
                    />
                </div>
            </Link>
        </div>
    </Drawer>
</template>
