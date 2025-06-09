<template>
  <div class=" overflow-hidden relative">
    <transition name="swipe-up" mode="out-in">
      <div :key="currentIndex" class="">
        {{ categories[currentIndex] }}
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
const props = defineProps(['texts'])
const categories = props.texts||[
  "Bangalore's last minute writing App",
  "open source book writing app",
  "Just Upload, We Write, and Deliver.",
  "Earn up to ₹1000/day Just by Writing!",
  "1st Order First Book writing Free*",
  "Upload the PDF up to 10 MB file size"
]; 
const currentIndex = ref(0)
let intervalId

onMounted(() => {
  intervalId = setInterval(() => {
    currentIndex.value = (currentIndex.value + 1) % categories.length
  }, 3000) // change every 2 seconds
})

onBeforeUnmount(() => {
  clearInterval(intervalId)
})
</script>

<style scoped>
.swipe-up-enter-active,
.swipe-up-leave-active {
  transition: all 0.5s ease;
}
.swipe-up-enter-from {
  transform: translateY(100%);
  opacity: 0;
}
.swipe-up-leave-to {
  transform: translateY(-100%);
  opacity: 0;
}
</style>
