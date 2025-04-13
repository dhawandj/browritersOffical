<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Polices" />
    <div class="relative  h-full    space-y-10 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">About Us</p>
        </nav>


        <div class="mx-5 space-y-7  max-w-screen-sm sm:mx-auto rounded-2xl shadow-2xl py-5 px-4">

            <p>"At <span class="text-primary ">Bro</span>writers, we believe in making a meaningful impact on the student community. Our service goes beyond writing notes, assignments, and records we're creating opportunities for students to earn without <span class="text-green-500">compromising their education</span> .</p>

            <p>When you choose Browriters, you're not just getting your work done; you're helping provide employment for students who contribute their skills while continuing their studies. We are committed to empowering students, fostering a supportive community, and ensuring education remains a priority.</p>

            <p>One book can make a difference—not just for you, but for another student striving to succeed. Together, let's build a future where every student has the chance to grow and thrive."</p>

            <div class="pb-20 flex justify-center ">
                <img class="" src="http://srv753447.hstgr.cloud/storage/uploads2/Component1.svg" alt="">
            </div>
        </div>






        <footer class=" bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
