<script setup>
import DrawerForFiles from '@/Components/DrawerForFiles.vue';
import FilePondForAdmin from '@/Components/FilePondForAdmin.vue';
import FilePondForUploading from '@/Components/FilePondForUploading.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { Drawer, InputText, Select } from 'primevue';
import { ref } from 'vue';

const props = defineProps(['order'])
const selectedStatus = ref({ name: 'Ordered' });

const form = useForm({
    order_status:{name:props.order.order_status}
})
const form1 = useForm({
    phone:usePage().props.auth.deliveryBoyNumber
})
const statuses = ref([
    { name: 'ordered' },
    { name: 'picked'},
    { name: 'writing'},
    { name: 'delivery' },
    { name: 'completed' },
]);

const t_bookFiles = ref(false)

function h_statusUpdate(params) {
    form.post(route('admin.update.status',{order:props.order}));
}
function h_phoneUpdate(params) {
    form1.patch(route('admin.update.phone'));
}
</script>

<template>
    <!-- <pre>{{ order }}</pre> -->
<div class="relative  h-full   space-y-10 bg-background text-white pb-10  mx-auto max-w-xl  ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
            @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Admin/Order</p>
        </nav>

        <!-- order -->
        <div class=" mx-5 bg-secondaryAlt p-2 rounded-xl space-y-2">
            <p class="text-lg font-bold flex justify-between">Order <span class="text-secondary font-semibold">Dhawan J</span></p>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">order-id</p>
                <p>{{ order.id }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Amount</p>
                <p>₹{{ order.amount }}</p>
            </div>
            <div   class="flex flex-col gap-2 p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Status</p>
                <Select @value-change="h_statusUpdate" v-model="form.order_status" :options="statuses" optionLabel="name" placeholder="Select " class="myselect" />
            </div>
            <div   class="flex flex-col gap-2 p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Delivery Boy Number</p>
                <div class="flex justify-between gap-4">
                    <InputText type="number" :invalid="!!form1.errors.phone" v-model="form1.phone" :fluid="true" />
                    <button @click="h_phoneUpdate"   class="bg-white p-2 text-black rounded-lg font-semibold">{{ form1.recentlySuccessful?'saved':'update' }}</button>
                </div>
            </div>
        </div>

        <!-- addresss -->
        <div class=" mx-5 bg-secondaryAlt p-2 rounded-xl space-y-2">
            <p class="text-lg font-bold flex justify-between">Address <span class="text-secondary font-semibold">Dhawan J</span></p>

            <div class="flex flex-col gap-2  p-2 bg-background rounded-lg capitalize">
                <p class="font-semibold text-gray-400  flex justify-between ">Pickup </p>
                <p class="break-words p-1">{{ order.p_address }}</p>
            </div>

            <div class="flex flex-col gap-2  p-2 bg-background rounded-lg capitalize">
                <p class="font-semibold text-gray-400  ">drop</p>
                <p class="break-words p-1">{{ order.d_address }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Pincode</p>
                <p>{{ order.pincode }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Phone 1</p>
                <p><a :href="`tel:${order.contact}`">{{ order.phone }}</a></p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Phone 2</p>
                <p><a :href="`tel:${order.contact}`">{{ order.contact }}</a></p>
            </div>
        </div>

         <!-- books -->
        <div class=" mx-5 bg-secondaryAlt p-2 rounded-xl space-y-2">
            <p class="text-lg font-bold flex justify-between">Book <span class="text-secondary font-semibold">Details</span></p>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Books</p>
                <p>{{ order.books.length }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Category</p>
                <p class="capitalize">{{ order.books[0].category }}</p>
            </div>
            <div v-for="book in order.books" @click="t_bookFiles = true" >
                <DrawerForFiles :book="book" />
            </div>
        </div>

        <!-- profile -->
        <div class=" mx-5 bg-secondaryAlt p-2 rounded-xl space-y-2">
            <p class="text-lg font-bold flex justify-between">Profile <span class="text-secondary font-semibold">Details</span></p>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Name</p>
                <p>{{ order.user.name }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Email</p>
                <p class="w-1/2 overflow-hidden text-ellipsis whitespace-nowrap">{{ order.user.email }}</p>
            </div>
        </div>
        
        <!-- payment  -->
        <div class=" mx-5 bg-secondaryAlt p-2 rounded-xl space-y-2">
            <p class="text-lg font-bold flex justify-between">Payment <span class="text-secondary font-semibold">Details</span></p>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Payment ID</p>
                <p class="w-1/2 overflow-hidden text-ellipsis whitespace-nowrap">{{ order.payment_id }}</p>
            </div>
            <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                <p class="font-semibold text-gray-400">Contact</p>
                <p>{{ order.contact }}</p>
            </div>
        </div>



    
</div>


</template>