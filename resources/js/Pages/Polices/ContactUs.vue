<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Polices" />
    <div class="relative  h-full   space-y-4 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Contact Us</p>
        </nav>
        <div class="mx-5 max-w-screen-sm sm:mx-auto  ">
            <div class="mx-5 max-w-screen-sm sm:mx-auto  mb-5 " >
            <h1 class="text-3xl font-bold mb-2">Contact Us</h1>
             <p class=" font-semibold text-gray-500 mb-6">Don't hesitate to contact us whether you have a suggestion on our improvement, a complain to discuss or an issue to solve.</p>

             <div class="space-y-5">
                 <h2 class="text-2xl font-bold mb-2">Contact Information</h2>
                 <p>If you have any questions, suggestions, or require assistance, feel free to reach out to us:</p>
                 <ul class="list-disc ml-6">
                     <li><strong>Phone:</strong> 8050859436 (Available 24/7)</li>
                     <li><strong>Support Email:</strong> support@browriters.com</li>
                 </ul>
             </div>
        </div>
            <!-- <h1 class="text-3xl font-bold mb-2">Contact Us</h1>
             <p class=" font-semibold text-gray-500 mb-6">Don't hesitate to contact us whether you have a suggestion on our improvement, a complain to discuss or an issue to solve.</p> -->

             <div class="grid grid-cols-2 gap-2 p-1">
                <a  href="tel:8050859436" class="bg-white h-36 hover:opacity-35  text-black rounded-3xl flex flex-col  gap-1 items-center  justify-center">
                    <div class="size-14  text-white rounded-2xl grid place-content-center bg-secondaryAlt"><Icon icon="solar:phone-linear" width="34" height="34" /></div>
                    <p class="font-bold text-xl">Call Us</p>
                    <p class="text-xs text-center text-secondary ">Our team is on the line </p>
                    <p class="text-xs text-center  font-semibold">Mon-Sun . 24/7 </p>

                </a>
                <a href="https://wa.me/+918050859436?text=Hi%20for%20BroWriters" target="_blank"  class="bg-white h-36 hover:opacity-35  text-black rounded-3xl flex flex-col  gap-1 items-center  justify-center">
                    <div class="size-14  text-white rounded-2xl grid place-content-center bg-secondaryAlt"><Icon icon="humbleicons:chat" width="34" height="34" /></div>
                    <p class="font-bold text-xl">Chat Us</p>
                    <p class="text-xs text-center text-secondary ">Our team is on the line </p>
                    <p class="text-xs text-center  font-semibold">Mon-Sun . 24/7 </p>

                </a>
             </div>
             <div class="space-y-5">
                 <h1 class="mt-5">Contact us in Social Media</h1>
            <!-- chat option -->
            <div class="flex items-center justify-between rounded-2xl bg-secondaryAlt p-3">
                <div class="flex items-center gap-2">
                    <div class="grid size-10 place-items-center rounded-full border bg-white">
                        <Icon
                            class="text-secondary"
                            icon="uil:instagram-alt"
                            width="30"
                            height="30"
                        />
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">Instagram</p>
                        <p class="text-textPrimary">4,6K Followers   •   118 Posts</p>
                    </div>
                </div>

                <div class="grid size-10 place-items-center rounded-full bg-background">
                    <Icon
                        class="text-white"
                        icon="lucide:share"
                        width="30"
                        height="30"
                    />
                </div>
            </div>
            <!-- contact us option -->

        </div>
        </div>



        <footer class=" bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
