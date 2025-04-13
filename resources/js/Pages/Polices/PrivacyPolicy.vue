<template>
  <div class="min-h-screen flex flex-col items-center px-6 py-12">
    <h1 class="text-3xl font-bold mb-6">Privacy Policy</h1>
    <div class="max-w-3xl text-gray-300 space-y-6">
      <p>Effective Date: {{ new Date().getFullYear() }}</p>

      <h2 class="text-xl font-semibold">1. Introduction</h2>
      <p>Welcome to Browriters Pens. We respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and protect your information.</p>

      <h2 class="text-xl font-semibold">2. Information We Collect</h2>
      <p>We may collect the following data when you visit our site or make a purchase:</p>
      <ul class="list-disc pl-6">
        <li>Personal details (name, email, phone, address).</li>
        <li>Payment information (processed securely via PhonePe).</li>
        <li>Device and browser details for analytics.</li>
      </ul>

      <h2 class="text-xl font-semibold">3. How We Use Your Information</h2>
      <ul class="list-disc pl-6">
        <li>To process and deliver your orders.</li>
        <li>To improve our services and user experience.</li>
        <li>For marketing and promotional purposes (with consent).</li>
        <li>To comply with legal obligations.</li>
      </ul>

      <h2 class="text-xl font-semibold">4. Cookies and Third-Party Services</h2>
      <p>We use cookies to enhance your browsing experience. We also use third-party services like Google AdSense for ads and PhonePe for secure payments.</p>

      <h2 class="text-xl font-semibold">5. Data Protection</h2>
      <p>We implement strict security measures to protect your data from unauthorized access, alteration, or loss.</p>

      <h2 class="text-xl font-semibold">6. Your Rights</h2>
      <p>You have the right to access, update, or delete your personal data. Contact us at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a> for requests.</p>

      <h2 class="text-xl font-semibold">7. Updates to This Policy</h2>
      <p>We may update this policy from time to time. Please review it periodically.</p>

      <h2 class="text-xl font-semibold">8. Contact Us</h2>
      <p>If you have any questions, contact us at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
ul {
  list-style: disc;
  margin-left: 1rem;
}
</style>
