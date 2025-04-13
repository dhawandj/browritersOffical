<template>
    <div class="min-h-screen flex flex-col items-center px-6 py-12">
      <h1 class="text-3xl font-bold mb-6">Refund & Cancellation Policy – Book Writing Service</h1>
      <div class="max-w-3xl text-gray-200 space-y-6">
        <p>Effective Date: {{ new Date().getFullYear() }}</p>
  
        <h2 class="text-xl font-semibold">1. Cancellation Policy</h2>
        <ul class="list-disc pl-6">
          <li>Cancellations are only accepted within <strong>12 hours</strong> of placing the order, provided the pickup has not been completed.</li>
          <li>If pickup has already occurred or writing has started, the order is considered non-cancellable and non-refundable.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">2. Refund Policy</h2>
        <ul class="list-disc pl-6">
          <li>Refunds are only provided in case of a verified error on our part, such as:
            <ul class="list-disc pl-6 mt-2">
              <li>Loss or damage of the customer's book during transit.</li>
              <li>Failure to complete the writing as per agreed terms (e.g., missing chapters, incomplete pages).</li>
            </ul>
          </li>
          <li>No refunds will be given for subjective dissatisfaction with handwriting style, formatting, or aesthetics.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">3. Content Responsibility</h2>
        <p>Students are responsible for providing clear instructions and reference material. Any miscommunication or lack of clarity in submitted material will not be considered valid grounds for refund.</p>
  
        <h2 class="text-xl font-semibold">4. Delivery Issues</h2>
        <ul class="list-disc pl-6">
          <li>If your book is delayed or misplaced during return delivery, please contact our support team immediately.</li>
          <li>We will take necessary steps, including compensation or rewriting, depending on the situation.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">5. Contact Us</h2>
        <p>For any refund or cancellation queries related to the Book Writing Service, please email us at <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  // No additional logic needed for now
  </script>
  
  <style scoped>
  ul {
    list-style: disc;
    margin-left: 1rem;
  }
  </style>
  