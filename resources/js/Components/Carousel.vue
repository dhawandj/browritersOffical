<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const slides = ref([
    'http://srv753447.hstgr.cloud/storage/uploads2/Frame2demo1.png',
    'http://srv753447.hstgr.cloud/storage/uploads2/banner1.png',
    'http://srv753447.hstgr.cloud/storage/uploads2/banner2.png',
    'http://srv753447.hstgr.cloud/storage/uploads2/banner3.jpg',
    'http://srv753447.hstgr.cloud/storage/uploads2/two.webp',
    'http://srv753447.hstgr.cloud/storage/uploads2/five.png',
    'http://srv753447.hstgr.cloud/storage/uploads2/four.webp',
]);

const currentIndex = ref(0);
let interval = null;

const startAutoPlay = () => {
    interval = setInterval(() => {
        nextSlide();
    }, 3000);
};

const stopAutoPlay = () => {
    if (interval) {
        clearInterval(interval);
        interval = null;
    }
};

const nextSlide = () => {
    currentIndex.value = (currentIndex.value + 1) % slides.value.length;
};

const prevSlide = () => {
    currentIndex.value =
        (currentIndex.value - 1 + slides.value.length) % slides.value.length;
};

const onSlideClick = (index) => {
    currentIndex.value = index;
    console.log(index);
};

onMounted(startAutoPlay);
onUnmounted(stopAutoPlay);
</script>

<template>
    <div
        class="relative mx-auto w-full max-w-3xl overflow-hidden rounded-lg shadow-lg"
    >
        {{ console.log($page.clearHistory) }}
        <div
            class="flex transition-transform duration-500"
            :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
        >
            <div
                v-for="(slide, index) in slides"
                :key="index"
                class="w-full flex-shrink-0 cursor-pointer"
                @click="onSlideClick(index)"
            >
                <img
                    :src="slide"
                    class="h-36 w-full object-cover md:h-72"
                    alt="Slide image"
                />
            </div>
        </div>

        <!-- Prev Button -->
        <button
            @click="prevSlide"
            class="absolute left-1 top-1/2 -translate-y-1/2 transform rounded-full bg-gray-800/45 p-2 text-white shadow-md backdrop-blur-sm"
        >
            &#10094;
        </button>

        <!-- Next Button -->
        <button
            @click="nextSlide"
            class="absolute right-1 top-1/2 -translate-y-1/2 transform rounded-full bg-gray-800/45 p-2 text-white shadow-md backdrop-blur-sm"
        >
            &#10095;
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-4 left-1/2 flex -translate-x-1/2 transform space-x-2" >
            <button
                v-for="(slide, index) in slides"
                :key="index"
                @click="currentIndex = index"
                class="h-3 w-3 rounded-full "
                :class="currentIndex === index ? 'bg-white' : 'bg-gray-400 '"
            ></button>
        </div>
    </div>
</template>
