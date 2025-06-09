<script setup>
import { useBook } from '@/useBook';
import { computed } from 'vue';

import PhonePayCheckoutBtn from './PhonePayCheckoutBtn.vue';

const props = defineProps(['book','offer']);
const books = useBook(props.book, props.book); //recative value -> ref 

const SERVICE_CHARGE = 20; //rs
const DELIVERY_CHARGE =0;
const noPages = 10;



// Computed property to calculate the total cost of all books
const subTotal = computed(() => {
    return books.value.reduce((sum, book) => sum + book.pages * 5, 0);
});

// Computed property to calculate the Grand Total
const grandTotal = computed(() => {
    return ((subTotal.value + SERVICE_CHARGE + DELIVERY_CHARGE)-discoutAmount(books.value[0])).toFixed(2);
});

 function discoutCondition(book) {

    // check book is offer is on
    if (!props.offer == 0) {
        return false
    }
    if (book.name ==='book 1') {
        return true
    }
 }
 function discoutAmount(book) {

    // check book is offer is on
    if (!props.offer == 0) {
        return 0
    }

    if (book.name ==='book 1') {
        // return book.pages * 5 
        return 50
    }

    return 0
 }
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
                    <!-- <td class="p-2" :class="{'line-through':discoutCondition(book)}">₹{{ book.pages * 5 }}</td> -->
                    <td class="p-2" >₹{{ book.pages * 5 }}</td>
                </tr>
            </tbody>
            <tfoot class="text-sm text-secondary">
                <tr>
                    <td colspan="5" class="p-1 text-end">Subtotal</td>
                    <td class="p-1">₹{{ subTotal }}</td>
                </tr>
                <tr class="text-green-700" v-if="discoutCondition(books[0])">
                    <td colspan="5" class="p-1 text-end font-semibold animate-pulse">Free 10 Pages </td>
                    <td class="p-1 animate-pulse"> - ₹{{ 50 }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="p-1 text-end">Delivery Charge</td>
                    <td class="p-1">₹{{ DELIVERY_CHARGE }}.0</td>
                </tr>
                <tr>
                    <td colspan="5" class="p-1 text-end">Service Charge</td>
                    <td class="p-1">₹{{ SERVICE_CHARGE }}</td>
                </tr>
                <tr class="font-bold text-green-600">
                    <td colspan="5" class="p-1 text-end">Grand Total</td>
                    <td class="p-1">₹{{ grandTotal }}</td>
                </tr>
            </tfoot>
        </table>
        <!-- payment btn -->
        <div class="text-center">
            <!-- <PaymentBtn  :total-amount="grandTotal" :books-data="books"/> -->
            <!-- <PaymentBtnCashFree /> -->
             <PhonePayCheckoutBtn  :totalAmount="grandTotal"  :booksData="books" />
        </div>
    </div>
</template>
