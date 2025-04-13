<script setup>
import BookAnimation from '@/Components/BookAnimation.vue';
import MyFooter from '@/Components/MyFooter.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Slider from '@/Components/Slider.vue';
import { Icon } from '@iconify/vue';
import { Link, router } from '@inertiajs/vue3';
const props = defineProps(['book']);
</script>

<template>
  <div class="min-h-screen bg-background text-white flex flex-col justify-between space-y-6">
    
    <!-- nav section -->
    <nav class="mx-4 mt-4">
      <Link href="/" class="text-3xl leading-none tracking-tight">
        <span class="font-bold text-primary">bro</span><span class="font-medium">writers.com</span>
      </Link>
      <p class="text-sm text-secondary mt-1">
        Bangalore's last minute writing app
      </p>
    </nav>

    <!-- quote section -->
    <div class="mx-4 sm:mx-auto max-w-md rounded-2xl bg-secondaryAlt p-4 text-center shadow-md">
      <p class="line-clamp-3 font-semibold text-sm sm:text-base leading-snug">
        One Book can make a difference — “not just for you” but for another student’s employment.
      </p>
    </div>

    <!-- book animation -->
    <div class="sm:hidden px-4">
      <BookAnimation />
    </div>
    <div class="hidden sm:block max-w-lg mx-auto">
      <Slider />
    </div>

    <!-- price info card -->
    <div class="mx-4 sm:mx-auto max-w-md flex items-center justify-center gap-3 rounded-xl bg-secondaryAlt p-3 text-secondary shadow-sm">
      <Icon icon="material-symbols:info-outline" width="24" height="24" />
      <p class="text-sm sm:text-base">We charge ₹5 per side of a page</p>
    </div>

    <!-- see why -->
    <div class="mx-20  sm:mx-auto max-w-sm flex items-center justify-center gap-2 rounded-xl bg-secondaryAlt p-3 text-secondary hover:bg-secondaryAlt/60 transition">
      <Icon icon="octicon:question-16" width="24" height="24" />
      <span class="text-sm sm:text-base">See Why ₹5</span>
      <Icon icon="weui:arrow-filled" width="16" height="26" />
    </div>

   <!-- continue button -->
<div class="mb-24"> <!-- Increased from mb-10 to mb-24 -->
  <Link replace :href="route('billing', { book: book })">
    <div class="mx-auto hover:opacity-80 active:scale-95 transition-all duration-200 mt-6 flex max-w-56 items-center justify-center gap-3 rounded-xl bg-primary p-3 text-secondaryAlt shadow-md">
      <p class="font-semibold text-base">Continue</p>
      <Icon icon="weui:arrow-filled" width="16" height="24" />
    </div>
  </Link>
</div>

<footer class="max-w-7xl mx-auto w-full mt-10 "> 
                <MyFooter />
        </footer>
  </div>
</template>
