<script setup>
import { ref, onMounted, nextTick } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { router } from '@inertiajs/vue3';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import { Autoplay, Pagination, Navigation } from 'swiper/modules';

function goLink(urlname, param = null) {
  router.get(route(urlname, param));
}

const swiperRef = ref(null);

const slides = [
  { type: 'image', image: 'http://browriters.com/storage/uploads2/ad1.png', link: 'billing', param: 'assignment' },
  { type: 'video', video: 'http://browriters.com/storage/uploads2/s4.mp4', link: 'billing', param: 'video1' },
  { type: 'image', image: 'http://browriters.com/storage/uploads2/banner9.png', link: 'billing', param: 'assignment' },
  { type: 'image', image: 'http://browriters.com/storage/uploads2/banner10.png', link: 'billing', param: 'assignment' },
  { type: 'image', image: 'http://browriters.com/storage/uploads2/banner11.png', link: 'billing', param: 'assignment' },
];

function onSwiper(swiper) {
  swiperRef.value = swiper;
}

function onSlideChange() {
  nextTick(() => {
    const activeSlide = slides[swiperRef.value.realIndex];
    if (activeSlide.type === 'video') {
      swiperRef.value.autoplay.stop(); // Stop autoplay
      const videoEl = swiperRef.value.el.querySelector('.swiper-slide-active video');
      if (videoEl) {
        videoEl.currentTime = 0;
        videoEl.play();
        videoEl.onended = () => {
          swiperRef.value.slideNext();
          swiperRef.value.autoplay.start(); // Resume autoplay after video ends
        };
      }
    } else {
      swiperRef.value.autoplay.start(); // Resume autoplay for image slides
    }
  });
}
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
      class="mySwiper rounded-xl"
      @swiper="onSwiper"
      @slideChange="onSlideChange"
    >
      <swiper-slide
        v-for="(slide, index) in slides"
        :key="index"
        @click="goLink(slide.link, slide.param)"
        class="cursor-pointer"
      >
        <div class="w-full h-44 sm:h-52 md:h-64 lg:h-72 xl:h-80 rounded-xl overflow-hidden">
          <img
            v-if="slide.type === 'image'"
            :src="slide.image"
            alt="Promo Banner"
            class="w-full h-full object-cover"
          />
          <video
            v-else-if="slide.type === 'video'"
            :src="slide.video"
            muted
            playsinline
            class="w-full h-full object-cover"
          ></video>
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>
