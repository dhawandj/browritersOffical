<template>
    <div class="min-h-screen flex flex-col items-center px-6 py-12">
      <h1 class="text-3xl font-bold mb-6">Frequently Asked Questions (FAQs)</h1>
      <div class="max-w-3xl text-gray-300 space-y-6">
        
        <div v-for="(faq, index) in faqs" :key="index" class="border-b pb-4">
          <button @click="toggleFaq(index)" class="w-full text-left font-semibold text-lg flex justify-between items-center">
            {{ faq.question }}
            <span>{{ openFaq === index ? '−' : '+' }}</span>
          </button>
          <p v-if="openFaq === index" class="mt-2 text-gray-400">{{ faq.answer }}</p>
        </div>
  
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const openFaq = ref(null);
  
  const toggleFaq = (index) => {
    openFaq.value = openFaq.value === index ? null : index;
  };
  
  const faqs = ref([
    {
      question: "What materials are used in browriters.com ?",
      answer: "Our pens are eco-friendly, made of paper and a small amount of wood to ensure durability while reducing plastic waste."
    },
    {
      question: "How can I place an order?",
      answer: "You can place an order directly on our website by selecting your favorite pen and clicking 'Buy Now'. Follow the checkout process to complete your purchase."
    },
    {
      question: "What payment methods do you accept?",
      answer: "We accept payments via PhonePe, UPI, debit/credit cards, and net banking."
    },
    {
      question: "How long does shipping take?",
      answer: "We process orders within 1-2 business days, and shipping typically takes 3-7 business days depending on your location."
    },
    {
      question: "Can I track my order?",
      answer: "Yes! Once your order is shipped, you will receive a tracking link via email and SMS."
    },
    {
      question: "What is your return policy?",
      answer: "You can return unused and undamaged products within 7 days. Please read our full refund policy for details."
    },
    {
      question: "Can I cancel my order?",
      answer: "Yes, orders can be canceled within 24 hours of placement. Once shipped, cancellations are not possible."
    },
    {
      question: "How do I contact customer support?",
      answer: "You can email us at support@browriters.com for any assistance."
    }
  ]);
  </script>
  
  <style scoped>
  button {
    background: none;
    border: none;
    padding: 10px 0;
    cursor: pointer;
  }
  button:hover {
    color: #3b82f6;
  }
  </style>
  