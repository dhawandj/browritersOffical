<template>
    <div class="min-h-screen p-4 bg-green-50 flex flex-col gap-6 max-w-7xl mx-auto font-sans">
      <!-- Header -->
      <header class="text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-green-800">BroWriters (Pens)</h1>
        <p class="text-sm md:text-base text-green-600">Sustainable writing with every stroke</p>
      </header>
  
      <!-- Main Content Grid -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Product Display -->
        <section class="bg-white p-4 rounded-xl shadow-md border border-green-200">
          <img src="http://srv753447.hstgr.cloud/storage/uploads2/p4.jpg" alt="Pen" class="w-full rounded-md" />
          <div class="mt-4">
            <h2 class="text-xl font-semibold text-green-700">EcoWrite Gel Pen</h2>
            <p class="text-green-600 text-sm mt-1">
              Eco-friendly ink, recyclable body — designed for mindful writing.
            </p>
            <div class="flex items-center justify-between mt-3 flex-wrap gap-2">
              <span class="text-lg font-bold text-green-800">₹{{ price }}</span>
              <div class="flex items-center gap-2">
                <button @click="decreaseQty" class="bg-green-500 text-white rounded-full px-3 py-1">-</button>
                <span class="text-green-800 font-semibold">{{ quantity }}</span>
                <button @click="increaseQty" class="bg-green-500 text-white rounded-full px-3 py-1">+</button>
              </div>
            </div>
          </div>
        </section>
  
        <!-- Checkout Section -->
        <section class="bg-white p-4 rounded-xl shadow-md border border-green-200">
          <h3 class="text-lg font-semibold text-green-700 mb-2">Checkout</h3>
          <form @submit.prevent="placeOrder" class="flex flex-col gap-3">
            <input type="text" v-model="customer.name" placeholder="Your Name" class="input" required />
            <input type="text" v-model="customer.phone" placeholder="Phone Number" class="input" required />
            <input type="text" v-model="customer.address" placeholder="Delivery Address" class="input" required />
  
            <div class="flex justify-between items-center mt-2">
              <span class="font-medium text-green-700">Total:</span>
              <span class="text-xl font-bold text-green-800">₹{{ totalPrice }}</span>
            </div>
  
            <button type="submit" class="bg-green-700 hover:bg-green-800 transition text-white py-2 rounded-lg mt-2">
              Place Order
            </button>
          </form>
        </section>
      </div>
  
      <!-- Thank You -->
      <section v-if="orderPlaced" class="bg-green-100 p-4 rounded-xl text-center shadow-md">
        <p class="text-green-700 font-semibold">
          Thank you, {{ customer.name }}! Your eco-friendly order has been placed.
        </p>
      </section>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  
  const price = 20
  const quantity = ref(1)
  
  const customer = ref({
    name: '',
    phone: '',
    address: ''
  })
  
  const orderPlaced = ref(false)
  
  const increaseQty = () => {
    quantity.value++
  }
  const decreaseQty = () => {
    if (quantity.value > 1) quantity.value--
  }
  
  const totalPrice = computed(() => quantity.value * price)
  
  const placeOrder = () => {
    alert('Currently Pens are out of stock')
    if (customer.value.name && customer.value.phone && customer.value.address) {
      orderPlaced.value = true
      console.log('Order Details:', {
        ...customer.value,
        quantity: quantity.value,
        total: totalPrice.value
      })
    }
  }
  </script>
  
  <style scoped>
  .input {
    @apply border text-black border-green-300 p-2 rounded-md w-full focus:ring-2 focus:ring-green-400 focus:outline-none;
  }
  </style>
  