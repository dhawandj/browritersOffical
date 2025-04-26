<script setup lang="ts">
import MySwiper from './MySwiper.vue';

</script>

<template>
     <div>
        <p class="mb-5 text-center capitalize underline underline-offset-8">
            what our bro's are saying
        </p>
    </div>
    <div class="slider">
      <div class="slide-track space-x-5">
          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c1.jpg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Chethan</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"Was super stressed about my notes, but they wrote and completed everything perfectly. Delivered on time without any issues! "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c2.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize ">Kumar</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"They wrote and completed my assignments so fast! Lifesaver!"</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c3.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Danraj</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"I was so nervous about the deadline, but they pulled through! "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c4.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Arjun</h1>
                        <p class="leading-snug  text-xs text-white/50  ">"These guys are awesome! this really last minute writing app "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c5.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Sanjan</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"No jokes, this service is a game changer. "</p>
                    </div>
            </div>
          </div>
    
        <!-- Repeat to create the loop -->
        <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="http://srv753447.hstgr.cloud/storage/uploads2/c1.jpg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">chea****</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"Was super stressed about my notes, but they wrote and completed everything perfectly. Delivered on time without any issues! "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="http://srv753447.hstgr.cloud/storage/uploads2/c2.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize ">Kum****</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"They wrote and completed my assignments so fast! Lifesaver!"</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c3.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Ram kumar</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"I was so nervous about the deadline, but they pulled through! "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com//storage/uploads2/c4.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Akas***</h1>
                        <p class="leading-snug  text-xs text-white/50  ">"These guys are awesome! this really last minute writing app "</p>
                    </div>
            </div>
          </div>

          <div class="slide">
            <div class=" border rounded-lg border-secondary h-full flex">
                    <div class="h-full w-1/2 bg-red-5 shrink-0">
                        <img class="" src="https://browriters.com/storage/uploads2/c5.jpeg" alt="Image 1">
                    </div>
                    <div class="text-white p-2 " >
                        <h1 class="font-semibold capitalize">Srey***</h1>
                        <p class="leading-snug  text-xs text-white/50 ">"No jokes, this service is a game changer. for students for learning new things "</p>
                    </div>
            </div>
          </div>
      </div>
    </div>
  </template>
  
  <style scoped>
  .slider {
      width: 100%;
      overflow: hidden;
      background: transparent;
      height: fit-content;
  }
  
  /* Allow scrolling on mobile */
  @media (hover: none) {
      .slider {
          /* overflow-x: scroll; */
          scroll-behavior: smooth;
      }
      .slide-track {
          animation-play-state: paused;
      }
  }
  
  /* Infinite Scroll Animation */
  .slide-track {
      display: flex;
      width: calc(300px * 10); /* Adjust based on number of slides */
      animation: scroll 50s linear infinite;
  }
  
  /* Pause animation on hover for desktop */
  .slider:hover .slide-track {
      animation-play-state: paused;
  }
  
  .slide {
      width: 300px;
      height: 150px;
      flex-shrink: 0;
  }
  
  .slide img {
      width: 100%;
      height: 100%;
      border-radius: 10px;
  }
  
  @keyframes scroll {
      0% {
          transform: translateX(0);
      }
      100% {
          transform: translateX(calc(-300px * 5)); /* Adjust for smooth looping */
      }
  }
  </style>
  