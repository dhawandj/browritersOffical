<script setup>
import { ref, watch } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import OrderList from '@/Components/OrderList.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { InputText } from 'primevue';
import debounce from 'lodash/debounce';

// Props from server
const props = defineProps(['orders', 'filters']);

// Reactive search state, initialize from server filters
const search = ref(props.filters?.search || '');

// Use Inertia router to trigger backend fetch with search query
const performSearch = debounce(() => {
  router.get(
    '/admin',
    { search: search.value },
    { preserveState: true, replace: true }
  );
}, 500); // debounce 500ms

// Watch search input and trigger search
watch(search, () => {
  performSearch();
});
</script>

<template>
  <div class="relative min-h-screen bg-background text-white flex flex-col space-y-6 p-4 md:p-8">
    <!-- nav bar -->
    <nav class="flex items-center bg-secondaryAlt/70 p-3 backdrop-blur-sm z-10 rounded-b-md">
      <Icon
        @click="goBack"
        icon="weui:back-filled"
        class="cursor-pointer"
        width="24"
        height="24"
      />
      <p class="flex-grow text-center text-lg font-semibold">Admin</p>
    </nav>

    <div class="space-y-4">
      <span class="inline-block bg-secondaryAlt rounded-lg px-4 py-2 text-sm md:text-base">
        Total: {{ orders.length }}
      </span>

      <div class="card flex justify-center">
        <InputText
          v-model="search"
          type="text"
          :fluid="true"
          placeholder="Search"
          class="w-full max-w-md"
        />
      </div>

      <div class="space-y-4 max-w-3xl mx-auto">
        <OrderList
          v-for="order in orders"
          :key="order.id"
          :order="order"
          class="block hover:opacity-70 transition-all duration-300" 
        />
      </div>
    </div>
  </div>
</template>
