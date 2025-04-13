<template>
    <div>
        <p class="mb-3 text-center capitalize underline underline-offset-8">
            what our bro's are saying
        </p>
    </div>
    <div
        ref="scrollContainer"
        class="scrollbar-hide relative flex w-full space-x-4 overflow-x-auto p-4"
        @touchstart="pauseAutoScroll"
        @touchend="resumeAutoScroll"
        @mousedown="pauseAutoScroll"
        @mouseup="resumeAutoScroll"
    >
        <div
            class="flex gap-5"
            :style="{
                transform: `translateX(${scrollX}px)`,
                transition: 'transform 0.05s linear',
            }"
        >
            <div
                v-for="(item, index) in clonedReviews"
                :key="index"
                class="w-64 flex-shrink-0 first:ml-4 last:mr-4 md:w-72"
            >
                <div
                    class="rounded-lg bg-secondaryAlt p-4 text-center shadow-lg"
                >
                    <img
                        :src="item.image"
                        alt="Review Image"
                        class="h-32 w-full rounded-lg object-cover"
                    />
                    <p class="mt-2 text-sm text-gray-600">{{ item.review }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';

const reviews = ref([
    {
        image: 'http://127.0.0.1:8000/storage/uploads2/one.webp',
        review: 'This is an amazing product!',
    },
    {
        image: 'http://127.0.0.1:8000/storage/uploads2/five.png',
        review: 'Highly recommend this to everyone.',
    },
    {
        image: 'http://127.0.0.1:8000/storage/uploads2/two.webp',
        review: 'Best experience ever!',
    },
]);

// Duplicate the reviews array to create an infinite scrolling effect
const clonedReviews = computed(() => [
    ...reviews.value,
    ...reviews.value,
    ...reviews.value,
]);
const scrollX = ref(0);
const scrollSpeed = ref(1); // Adjust speed here (higher value = faster scroll)
let scrollInterval = null;

const startAutoScroll = () => {
    if (scrollInterval) return;
    scrollInterval = setInterval(() => {
        scrollX.value -= scrollSpeed.value; // Move left at controlled speed
        if (Math.abs(scrollX.value) >= reviews.value.length * 300) {
            scrollX.value = 0; // Reset position to create loop effect
        }
    }, 16); // ~60 FPS
};

const pauseAutoScroll = () => {
    clearInterval(scrollInterval);
    scrollInterval = null;
};

const resumeAutoScroll = () => {
    setTimeout(startAutoScroll, 2000); // Resume scrolling after 2s delay
};

onMounted(() => {
    startAutoScroll();
});
</script>

<style scoped>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
