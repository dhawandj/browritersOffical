<script setup>
import { ref } from 'vue'
import axios from 'axios';
import MySpinner from './MySpinner.vue';
import { router } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';
const props = defineProps(['totalAmount', 'booksData'])

const isLoading = ref(false);

const placeOrder = async () => {
  // Check if totalAmount is less than ₹200
  if (props.totalAmount < 200) {
    alert('Minimum order amount is ₹200.');
    return; // Prevent order placement if the total amount is less than ₹200
  }

  try {
    isLoading.value = true; // Start spinner

    const payLoad = {
        amount: props.totalAmount
    }
    const response = await axios.post(route('payment'), payLoad);
    console.log("PhonePe Token Response:", response.data);

    let tokenUrl = response.data.redirectUrl;

    window.PhonePeCheckout.transact({
      tokenUrl: tokenUrl,
      callback: (result) => {
        callback(result, response.data.merchantOrderId, response.data.access_token);
        // isLoading.value = false; // Stop spinner
      },
      type: "IFRAME"
    });

  } catch (error) {
    console.error("Error:", error.response ? error.response.data : error.message);
    isLoading.value = false; // Stop spinner on error
  } finally {
    isLoading.value = false; // Stop spinner
  }
};

async function callback(response, merchantOrderId, accesToken) {
  if (response === 'USER_CANCEL') {
    console.log('User cancelled:', response);
    return;
  }

  if (response === 'CONCLUDED') {
    try {
      isLoading.value = true; // Start spinner

      const payLoad = {
        merchantOrderId: merchantOrderId,
        access_token: accesToken,
        books: props.booksData ?? null
      };

      const res = await axios.post(route('payment.status'), payLoad);
      console.log('Payment verification response:', res.data.order);

      // Redirect user to the order details page or success page
      if (res.data?.order) {
          router.get(route('order', { order: res.data.order }));
      } else {
        alert('There was a problem with your payment. Please try again.');
      }

    } catch (err) {
      console.error('Payment verification error:', err.response ? err.response.data : err.message);
    } finally {
      isLoading.value = false; // Stop spinner
    }
  }
}

</script>

<template>
    <MySpinner v-if="isLoading" />
    <div 
        class="mx-5 my-3 flex items-center justify-center rounded-lg bg-primary p-2 text-secondaryAlt" 
        @click="placeOrder" 
        :disabled="isLoading"
        :class="{'cursor-not-allowed opacity-50': isLoading || totalAmount < 200}">
        <Icon class="mr-2" icon="fluent-mdl2:money" width="24" height="24" />
        <p class="font-semibold">Pay ₹{{ totalAmount }}</p>
    </div>
</template>
