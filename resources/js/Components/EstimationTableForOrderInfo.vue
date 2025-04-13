<script setup>
import { useBook } from '@/useBook';
import { computed } from 'vue';
import { Icon } from '@iconify/vue';

const props = defineProps(['order']);
const books = props.order.books

const SERVICE_CHARGE = 20; //rs
const DELIVERY_CHARGE = 0;

// Computed property to calculate the total cost of all books
const subTotal = computed(() => {
    return books.reduce((sum, book) => sum + book.pages * 5, 0);
});

// Computed property to calculate the Grand Total
const grandTotal = computed(() => {
    return (subTotal.value + SERVICE_CHARGE + DELIVERY_CHARGE).toFixed(2);
});
</script>
<template>
    <div
        class="mx-auto flex max-w-sm flex-col justify-center rounded-2xl bg-secondaryAlt p-2 px-3"
    >
        <table>
            <thead>
                <tr class="font-semibold">
                    <th class="p-2">Books</th>
                    <th class="p-2">Pages</th>
                    <th class="p-2"></th>
                    <th class="p-2">Price</th>
                    <th class="p-2"></th>
                    <th class="p-2">total</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="book in books"
                    class="text-center text-sm text-primary"
                >
                    <td class="p-2">{{ book.name }}</td>
                    <td class="p-2">{{ book.pages }}</td>
                    <td class="p-2">x</td>
                    <td class="p-2">₹5</td>
                    <td class="p-2">=</td>
                    <td class="p-2">₹{{ book.pages * 5 }}</td>
                </tr>
            </tbody>
            <tfoot class="text-sm text-secondary">
                <tr>
                    <td colspan="5" class="p-1 text-end">Subtotal</td>
                    <td class="p-1">₹{{ subTotal }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="p-1 text-end">Delivery Charge</td>
                    <td class="p-1">₹{{ DELIVERY_CHARGE }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="p-1 text-end">Service Charge</td>
                    <td class="p-1">₹{{ SERVICE_CHARGE }}</td>
                </tr>
                <tr class="font-bold">
                    <td colspan="5" class="p-1 text-end">Grand Total</td>
                    <td class="p-1">₹{{ grandTotal }}</td>
                </tr>
            </tfoot>
        </table>
        <!-- payment btn -->
        <div>
            <div class="  text-center capitalize p-2 rounded-2xl  bg-background text-green-500 flex justify-center gap-5 items-center font-semibold"> paid <span v-if="grandTotal!== order.amount" class="line-through">₹{{ grandTotal }} </span> {{ order.amount }}
                <Icon icon="carbon:checkmark-filled" width="29" height="29" />
            </div>
        </div>
    </div>
</template>
