<template>
    <div class="min-h-screen flex flex-col items-center px-6 py-12">
      <h1 class="text-3xl font-bold mb-6">Shipping & Delivery Policy</h1>
      <div class="max-w-3xl text-gray-300 space-y-6">
        <p>Effective Date: {{ new Date().getFullYear() }}</p>
  
        <h2 class="text-xl font-semibold">1. Shipping Locations</h2>
        <p>We currently ship our eco-friendly pens **across India**. International shipping is not available at this time.</p>
  
        <h2 class="text-xl font-semibold">2. Shipping Charges</h2>
        <ul class="list-disc pl-6">
          <li>Standard shipping is **free** for orders above ₹500.</li>
          <li>Orders below ₹500 incur a flat ₹50 shipping fee.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">3. Estimated Delivery Time</h2>
        <ul class="list-disc pl-6">
          <li>Orders are processed within **1-2 business days**.</li>
          <li>Delivery takes **3-7 business days** depending on the location.</li>
          <li>Metropolitan areas: **3-5 days**, Rural areas: **5-7 days**.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">4. Order Tracking</h2>
        <p>Once your order is shipped, you will receive a **tracking link** via email and SMS.</p>
  
        <h2 class="text-xl font-semibold">5. Delayed or Lost Shipments</h2>
        <p>If your order is delayed beyond the estimated delivery time, please **contact us at**  
          <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>
        <p>If your package is lost in transit, we will offer a **full refund or replacement**.</p>
  
        <h2 class="text-xl font-semibold">6. Damaged or Incorrect Orders</h2>
        <ul class="list-disc pl-6">
          <li>If you receive a damaged product, **contact us within 48 hours** with photos.</li>
          <li>We will arrange a replacement or refund as per our <Link :href="route('rr')" class="text-blue-500">Refund Policy</Link>.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">7. Contact Us</h2>
        <p>For shipping-related queries, email us at  
          <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>
      </div>
    </div>
  </template>
  
  <script setup>
import { Link } from '@inertiajs/vue3';

  </script>
  
  <style scoped>
  ul {
    margin-left: 1rem;
  }
  </style>
  