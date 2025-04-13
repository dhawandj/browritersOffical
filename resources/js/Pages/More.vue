<script setup>
import MyFooter from '@/Components/MyFooter.vue';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['order']);
</script>

<template>
  <Head title="More" />

  <div class="relative min-h-screen bg-background text-white flex flex-col justify-between">

    <!-- Navbar -->
    <nav class="sticky top-0 left-0 z-40 flex items-center bg-secondaryAlt/60 backdrop-blur-sm px-4 py-3">
      <Link href="/" class="flex items-center gap-2 text-white">
        <Icon icon="weui:back-filled" width="20" height="20" />
        <span class="text-sm font-semibold">Back</span>
      </Link>
      <p class="flex-grow text-center text-base font-semibold">More</p>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow space-y-6 p-4 sm:p-6 max-w-xl w-full mx-auto">

      <!-- Mixed Books Card -->
      <Link
        :href="route('billing', { book: 'Mixed' })"
        class="bg-white text-black rounded-xl p-4 flex justify-between items-center gap-4 shadow-md hover:opacity-90 transition"
      >
        <div class="flex flex-col justify-between">
          <p class="font-semibold text-lg">Mixed Books</p>
          <p class="text-sm text-black/60 mb-2">All categories</p>
          <p class="text-xs sm:text-sm font-bold px-4 py-1 bg-gray-200 rounded-full w-max">
            Order now
          </p>
        </div>
        <Icon icon="uil:books" width="80" height="80" class="hidden sm:block" />
        <Icon icon="uil:books" width="60" height="60" class="block sm:hidden" />
      </Link>

    </main>

    <!-- Footer -->
    <footer class="w-full mt-auto">
      <MyFooter />
    </footer>
  </div>
</template>
