<script setup>
import OrderList from '@/Components/OrderList.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { InputText } from 'primevue';

defineProps(['orders'])
</script>

<template>
     <div class="relative  h-svh   space-y-10 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
            @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Admin</p>
        </nav>
        <div class="mx-5 space-y-5">
            <span class="p-3 bg-secondaryAlt rounded-lg">Total: {{ orders.length }}</span>
             <div class="card flex justify-center ">
                     <InputText type="text" :fluid="true" placeholder="Search" />
              </div>
              <div>
              </div>

              <div>
                    <div class="space-y-3">
                        <OrderList v-for="order in orders" :order="order" />
                    </div>
              </div>
        </div>
    </div>
</template>