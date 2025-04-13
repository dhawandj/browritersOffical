<script setup>
import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Polices" />
  <div class="flex flex-col min-h-screen bg-background text-white">
    <!-- nav bar -->
    <nav class="sticky top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm shadow-sm">
      <Icon
        @click="goBack"
        icon="weui:back-filled"
        class="absolute ml-2 font-semibold"
        width="20"
        height="20"
      />
      <p class="flex-grow text-center text-base font-semibold tracking-wide">Legal Polices</p>
    </nav>

    <!-- policy list -->
    <div class="mx-4 space-y-3 mb-5 uppercase max-w-screen-sm sm:mx-auto rounded-2xl shadow-xl py-5 px-2 flex-grow">
      <Link
        :href="route('p.index',{comp:'PrivacyPolicy'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Privacy Policy</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('p.index',{comp:'TermsConditions'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Terms and conditions</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('p.index',{comp:'ShippingDelivery'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Shipping and Delivery</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('p.index',{comp:'RefundReturn'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Return and Refund</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('bwsp')"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Book Writing Service Policy</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('bwrp')"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Book Writing Refund Policy</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('p.index',{comp:'ContactUs'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>Contact Us</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>

      <Link
        :href="route('p.index',{comp:'AboutUs'})"
        class="flex justify-between items-center p-3 bg-white/5 rounded-lg transition hover:bg-white/10"
      >
        <p>About Us</p>
        <Icon icon="weui:arrow-filled" width="24" height="24" />
      </Link>
    </div>

    <!-- footer -->
    <footer class="mt-auto">
      <MyFooter />
    </footer>
  </div>
</template>
