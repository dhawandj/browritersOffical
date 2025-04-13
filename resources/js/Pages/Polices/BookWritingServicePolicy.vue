<template>
    <div class="min-h-screen flex flex-col items-center px-6 py-12">
      <h1 class="text-3xl font-bold mb-6">Book Writing Service Policy</h1>
      <div class="max-w-3xl text-gray-300 space-y-6">
  
        <p>Effective Date: {{ new Date().getFullYear() }}</p>
  
        <h2 class="text-xl font-semibold">1. Service Overview</h2>
        <p>
          Our Book Writing Service allows students to submit handwritten book orders, where our team picks up their books, writes content on their behalf, and delivers them back safely.
        </p>
  
        <h2 class="text-xl font-semibold">2. Service Availability</h2>
        <p>
          This service is currently available in select areas. You will be notified during the order process if your location is eligible.
        </p>
  
        <h2 class="text-xl font-semibold">3. Pickup & Delivery</h2>
        <ul class="list-disc pl-6">
          <li>Our team will coordinate pickup of your books from the address provided at checkout.</li>
          <li>Once writing is completed, the books will be delivered back to the same address.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">4. Service Timeline</h2>
        <ul class="list-disc pl-6">
          <li>Pickup is scheduled within 1-2 days of order confirmation.</li>
          <li>Writing duration depends on book volume - typically between 1-2 days.</li>
          <li>Delivery is arranged immediately after writing is complete.</li>
        </ul>
  
        <h2 class="text-xl font-semibold">5. Handling & Safety</h2>
        <p>
          We handle all books with utmost care. However, please avoid sending valuable or irreplaceable items. In case of loss or damage, we will attempt to resolve the issue on a case-by-case basis.
        </p>
  
        <h2 class="text-xl font-semibold">6. Order Changes & Cancellations</h2>
        <p>
          Once writing begins, orders cannot be cancelled. If you need to modify details before pickup, contact us immediately at 
          <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.
        </p>
  
        <h2 class="text-xl font-semibold">7. Contact Us</h2>
        <p>
          For queries about our Book Writing Service, email us at  
          <a href="mailto:support@browriters.com" class="text-blue-500">support@browriters.com</a>.
        </p>
        
      </div>
    </div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  ul {
    margin-left: 1rem;
  }
  </style>
  