<template>
  <div class="min-h-screen flex flex-col items-center px-6 py-12">
    <h1 class="text-3xl font-bold mb-6">Terms & Conditions</h1>
    <p>This website is managed By Dhawan J</p>
    <div class="max-w-3xl text-gray-300 space-y-6">
      <p>Effective Date: {{ new Date().getFullYear() }}</p>

      <h2 class="text-xl font-semibold">1. Introduction</h2>
      <p>Welcome to Browriters Pens. By accessing or purchasing from our website, you agree to abide by these terms and conditions.</p>

      <h2 class="text-xl font-semibold">2. Use of Website</h2>
      <ul class="list-disc pl-6">
        <li>You must be at least 18 years old or have parental consent to use this website.</li>
        <li>You agree not to misuse our services or interfere with website operations.</li>
      </ul>

      <h2 class="text-xl font-semibold">3. Orders & Payments</h2>
      <ul class="list-disc pl-6">
        <li>All orders are subject to availability.</li>
        <li>Prices are listed in INR and include applicable taxes.</li>
        <li>Payments are processed securely via PhonePe and other available methods.</li>
      </ul>

      <h2 class="text-xl font-semibold">4. Shipping & Delivery</h2>
      <ul class="list-disc pl-6">
        <li>We deliver across India. Shipping times may vary based on location.</li>
        <li>Tracking details will be provided upon dispatch.</li>
      </ul>

      <h2 class="text-xl font-semibold">5. Returns & Refunds</h2>
      <ul class="list-disc pl-6">
        <li>We accept returns within 7 days of delivery for unused and undamaged products.</li>
        <li>Refunds will be processed within 5-7 business days after product inspection.</li>
      </ul>

      <h2 class="text-xl font-semibold">6. Warranty & Liability</h2>
      <ul class="list-disc pl-6">
        <li>Our eco-friendly pens are designed for daily use but do not come with a warranty.</li>
        <li>We are not responsible for misuse or damages caused by external factors.</li>
      </ul>

      <h2 class="text-xl font-semibold">7. Privacy & Data Protection</h2>
      <p>Your data is handled securely as per our <Link :href="route('pp')" class="text-blue-500">Privacy Policy</Link>.</p>

      <h2 class="text-xl font-semibold">8. Updates to Terms</h2>
      <p>We may update these terms from time to time. Continued use of the website indicates your acceptance of the updated terms.</p>

      <h2 class="text-xl font-semibold">9. Contact Us</h2>
      <p>For any queries, contact us at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>

      <h2 class="text-xl font-semibold">10. Book Writing Service</h2>
      <ul class="list-disc pl-6">
        <li>This service involves physical pickup and delivery of student notebooks for writing purposes.</li>
        <li>Users must ensure their books are clearly labeled and not of high monetary or sentimental value.</li>
        <li>We are not liable for damages caused during transit, though we handle all books with care.</li>
        <li>Turnaround time depends on workload and book volume; estimated duration will be communicated at the time of order.</li>
        <li>Once writing has started, cancellations are not allowed.</li>
        <li>Any disputes or concerns must be reported within 24 hours of receiving the completed book.</li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
ul {
  list-style: disc;
  margin-left: 1rem;
}
</style>
