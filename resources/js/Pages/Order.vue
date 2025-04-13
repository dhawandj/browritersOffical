<script setup>
import BookInfoCard from '@/Components/BookInfoCard.vue';
import FileUploadSpace from '@/Components/FileUploadSpace.vue';
import MyFooter from '@/Components/MyFooter.vue';
import ShippingOrderBtnSpace from '@/Components/ShippingOrderBtnSpace.vue';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['order']);
</script>

<template>
    <Head title="Order" />
    <div class="flex min-h-screen flex-col bg-background text-white">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 z-10 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Link href="/" class="absolute ml-2 font-semibold block">
                <Icon icon="weui:back-filled" width="12" height="24" />
            </Link>
            <p class="flex-grow text-center">Bro Order</p>
        </nav>

        <!-- main content -->
        <main class="flex-grow space-y-10 pb-20">
            <!-- BookInfoCard -->
            <div class="mx-auto max-w-lg mt-5">
                <BookInfoCard :order="order" />
            </div>

            <!-- shipping & order info btn -->
            <div class="mx-auto max-w-lg">
                <ShippingOrderBtnSpace :order="order" />
            </div>

            <!-- file uploading spaces -->
            <div class="mx-5 sm:mx-auto max-w-lg rounded-2xl bg-secondaryAlt p-1">
                <FileUploadSpace v-for="book in order.books" :key="book.id" :book="book" />
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full bg-secondaryAlt p-1">
            <MyFooter />
        </footer>
    </div>
</template>
