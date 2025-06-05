<script setup>
import BroStats from '@/Components/BroStats.vue';
import CardBtn from '@/Components/CardBtn.vue';
import CardJobBtn from '@/Components/CardJobBtn.vue';
import IconBtn from '@/Components/IconBtn.vue';
import MyFooter from '@/Components/MyFooter.vue';
import MySwiper from '@/Components/MySwiper.vue';
import Slider from '@/Components/Slider.vue';
import TextSwiper from '@/Components/TextSwiper.vue';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
defineProps(['userCount','jobsCount','booksCount'])

const showBanner = ref(false);
setTimeout(()=>{
showBanner.value = true
},2000)
</script>
<template>
    <Head title="home" />

    <div class="bordr-2 mx-auto flex h-full flex-col border-red-500 bg-background text-white">
        <!-- ads banner -->
        <div v-show="showBanner"  class="sticky items-center  left-0 top-0 z-50 flex w-full justify-between bg-black/45 p-3 backdrop-blur-sm " >
            <h1 class="text-center capitalize font-anton">1st Order First Book writing <span class="text-green-500">Free*</span></h1>
            <Link href="inspire/observation"  v-if="$page.props.auth.user===null"  class="bg-primary border border-secondaryAlt text-xs text-black py-1 px-4 rounded-md font-semibold">Register here</Link>
            <Icon v-else @click="showBanner=false"  class="mr-2 text-red-400" icon="gg:close-o" width="24" height="24" />
        </div>
        <!-- nav bar -->
        <nav>
            <h1 class="borde  relative p-2 text-center text-xl font-semibold  " >
                <span class=" text-primary  font-anton tracking-wider ">Bro</span><span class="font-anton text-sm  tracking-wider " >writers.com</span>
                <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button" class="absolute right-3 top-3"><Icon icon="streamline-pixel:interface-essential-signout-logout" width="24" height="24" /></Link>
                <Link v-else="!$page.props.auth.user" :href="route('login')"  class="absolute right-3 top-3"><Icon icon="line-md:login" width="24" height="24" /></Link>
            </h1>
            <h1 class="text-center text-sm capitalize text-secondary font-semibold">
                <TextSwiper  class="text-center text-sm capitalize text-secondary font-semibold" />
            </h1>
        </nav>
        <main class="mx-2 grid-cols-2 space-y-9 p-1 sm:grid max-w-7xl sm:mx-auto ">
            <div class="p-1">
                <!-- <Carousel /> -->
                 <MySwiper />
            </div>
            <!-- card button  -->
            <div class="borde grid grid-cols-2 place-items-center gap-4 ">
                <CardBtn
                    href="inspire/observation"
                    :is-new="true"
                    name="Observation"
                />
                <CardBtn class="skills-card" href="inspire/record" name="Record" />
                <CardBtn class="skills-card" href="inspire/assignment" name="Assignment" />
                <CardJobBtn  />
            </div>

            <!-- icons button  -->
            <div class="mx-4 flex gap-10 items-center">
                <Link :href="route('orders')">
                    <IconBtn icon="solar:box-broken" label="My Orders" />
                </Link>
                <Link :href="route('more')">
                    <IconBtn icon="material-symbols:box" label="More" />
                </Link>
                <Link :href="route('pen')">
                    <IconBtn icon="material-symbols:ink-pen" label="Pens" />
                </Link>
            </div>
            <!-- bro statictis -->
            <div>
                <BroStats :booksCount :jobsCount :userCount />
            </div>
            <!-- bro comments  -->
            <div class="col-span-2">
                <!-- <Comments /> -->
                 <Slider />
            </div>
        </main>

        <footer class="max-w-7xl mx-auto w-full mt-10 "><MyFooter /></footer>
    </div>
</template>
