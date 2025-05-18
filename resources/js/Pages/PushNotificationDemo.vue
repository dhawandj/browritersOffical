<template>

<div class="text-center mt-5">
  <h1>Push Notification Demo</h1>
  <Button @click="showNotification">Show Notification</Button>
</div>
</template>
<script setup>
import { Button } from 'primevue'


const showNotification = () => {
  if (!('Notification' in window)) {
    alert('This browser does not support desktop notification')
    return
  }
  Notification.requestPermission().then(permission => {
    if (permission === 'granted') {
       new Notification('Hello!')
    } else {
      alert('Notification permission denied')
    }
  })
}
</script>