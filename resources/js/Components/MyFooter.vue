<script setup>
// import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';

</script>
<template>
     <div class=" sm:block hidden bg-secondaryAlt p-3 text-center">
                 <p class="mb-4">&copy; 2025 browriters.com . All rights reserved.</p>
                <div class="  flex flex-wrap justify-center space-x-4 text-sm ">
                    <Link :href="route('pp')"  class="hover:underline">Privacy Policy</Link>
                    <Link  :href="route('td')"  class="hover:underline">Terms & Conditions</Link>
                    <Link :href="route('rr')"  class="hover:underline">Refund & Return Policy</Link>
                    <Link :href="route('sd')" class="hover:underline">Shipping & Delivery Policy</Link>
                    <Link :href="route('bwsp')"  class="hover:underline">Book Writing Service Policy</Link>
                    <Link :href="route('bwrp')"  class="hover:underline">Book Writing Refund Policy</Link>
                    <Link :href="route('contact-us')" class="hover:underline">Contact Us</Link>
                    <Link :href="route('about')" class="hover:underline">About Us</Link>
                    <Link :href="route('p.index')" class="">Legal Polices</Link>

                </div> 
      </div>
                <div class="sm:hidden flex justify-between  bg-secondaryAlt p-3 text-center ">
                    <Link :href="route('p.index')" class="">Legal Polices</Link>
                    <Link :href="route('home')">&copy; 2025 browriters.com</Link>
                  </div>
</template>
