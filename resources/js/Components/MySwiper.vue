<script setup>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
import { router } from '@inertiajs/vue3';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

// Import required modules
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

function goLink(urlname, param = null) {
    router.get(route(urlname, param));
}
const slides = [
  { image: 'http://browriters.com/storage/uploads2/ad1.png', link: 'billing', param: 'assignment' },
  { image: 'http://browriters.com/storage/uploads2/banner11.png', link: 'billing', param: 'mixed' },
  { image: 'http://browriters.com/storage/uploads2/banner9.png', link: 'billing', param: 'record' },
  { image: 'http://browriters.com/storage/uploads2/banner10.png', link: 'jobs' },
];
</script>

<template>
  <div class="w-full px-2 sm:px-4 md:px-6">
    <swiper
      :spaceBetween="15"
      :centeredSlides="true"
      :autoplay="{
        delay: 3000,
        disableOnInteraction: false,
      }"
      :pagination="{
        clickable: true,
        dynamicBullets: true,
      }"
      :navigation="false"
      :modules="[Autoplay, Pagination, Navigation]"
      class="mySwiper rounded-xl "
    >
      <swiper-slide
        v-for="(slide, index) in slides"
        :key="index"
        @click="goLink(slide.link, slide.param)"
        class="cursor-pointer"
      >
        <div
          class="w-full h-44 sm:h-52 md:h-64 lg:h-72 xl:h-80 rounded-xl overflow-hidden"
        >
          <img
            :src="slide.image"
            alt="Promo Banner"
            class="w-full h-full object-cover"
          />
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>



