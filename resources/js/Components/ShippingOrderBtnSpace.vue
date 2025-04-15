<script setup>
import { Icon } from '@iconify/vue';
import { Drawer } from 'primevue';
import { ref } from 'vue';
import EstimationTable from './EstimationTable.vue';
import ShippingInfoForm from './ShippingInfoForm.vue';
import EstimationTableForOrderInfo from './EstimationTableForOrderInfo.vue';
const props = defineProps(['order'])

const t_shipping = ref(!props.order.phone);
const t_order = ref(false);
</script>
<template>
    <div class="mx-5 grid grid-cols-2 gap-2">
        <button
            @click="t_shipping = true"
            class="flex items-center justify-center gap-2 rounded-lg bg-white p-2 text-black transition-all duration-300 hover:opacity-50"
        >
            <Icon icon="gridicons:shipping" width="24" height="24" />
            <p class="truncate">Shipping Info</p>
        </button>
        <button
            @click="t_order = true"
            class="flex items-center justify-center gap-2 rounded-lg bg-white p-2 text-black transition-all duration-300 hover:opacity-50"
        >
            <Icon icon="solar:box-broken" width="24" height="24" />
            <p>Order Info</p>
        </button>
    </div>

    <!-- shipping info drawer   -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="t_shipping"
        header="Shipping Info"
        position="bottom"
        style="height: 500px"
    >
        <div class="space-y-5 p-2">
            <ShippingInfoForm :order="order" @close="t_shipping = false" />
        </div>
    </Drawer>

    <!-- order info drawer -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="t_order"
        header="Order Info"
        position="bottom"
        style="height: auto"
    >
        <div>
            <!-- <EstimationTable /> -->
             <EstimationTableForOrderInfo :order="order" />
        </div>
    </Drawer>
</template>
