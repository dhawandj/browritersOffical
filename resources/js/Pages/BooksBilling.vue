<script setup>
import BookBilling from '@/Components/BookBilling.vue';
import Comments from '@/Components/Comments.vue';
import EstimationTable from '@/Components/EstimationTable.vue';
import Slider from '@/Components/Slider.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
import { Toast } from 'primevue';

defineProps(['book','offer']); //book = bookname 
const toastBreakpoints = {
    '960px': { width: '50%', left: '25%' }, // For screens 960px and above
    '640px': { width: '90%', left: '5%' }, // For screens between 640px and 960px
    '0px': { width: '90%', left: '5%' }, // For screens below 640px
};
</script>

<template>
    <div class="min-h-screen space-y-10 bg-background text-white">
        <!-- nav bar -->
        <nav
            class="sticky z-50 left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm"
        >
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <Link href="/"   class="flex-grow text-center capitalize">{{ book }} Book </Link>
        </nav>
        <!-- book billing comp -->
         <!-- <pre>{{ offer }}</pre> -->
        <div>
            <BookBilling :book="book" :offer="offer" />
        </div>

        <!-- estimation table -->
        <div class="mx-4">
            <EstimationTable :book="book" :offer="offer" />
        </div>

        <!-- bro comments  -->
        <div class="">
            <!-- <Comments /> -->
             <Slider />
        </div>
        <Toast :breakpoints="toastBreakpoints" />
    </div>
</template>
