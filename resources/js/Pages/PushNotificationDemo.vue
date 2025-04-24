 <script setup>
import { onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'

const { props } = usePage()

const subscribeToPush = async () => {

  const permission = await Notification.requestPermission()
  if (permission !== 'granted') return

  const registration = await navigator.serviceWorker.register('/webpush.js')

  const subscription = await registration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey:props.auth.vapidPublicKey, // we’ll pass this from the backend
  })

  console.log('this is the subscription', subscription);

  await axios.post('/push-subscribe', subscription)
}

const sendNotification = async () => {
  try {
    await axios.post('/send-push-notification')
  //  alert('Notification sent 🚀')
  } catch (err) {
    console.error(err)
    alert('Error sending notification')
  }
}

onMounted(() => {
    // console.log(props);
  // if ('serviceWorker' in navigator && Notification.permission !== 'granted') {
  //   subscribeToPush()
  // }
})

const enableSubscription = async () => {
  const permission = await Notification.requestPermission()
  if (permission !== 'granted') return

  // const registration = await navigator.serviceWorker.register('webpush.js')
  const registration = await navigator.serviceWorker.ready;
  const subscription = await registration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: props.auth.vapidPublicKey, // we’ll pass this from the backend
  })

  console.log('this is the subscription', subscription);

  const response =   await axios.post('/push-subscribe', subscription)
  console.log('this is the response', response);
  if (response.status === 200) {
    alert('Subscription successful')
  } else {
    alert('Subscription failed')
  }
}
</script>

<template>
  <div class="max-w-sm mx-auto space-x-10 space-y-10">
    <h1>Laravel Web Push + Vue 3</h1>
    <button class="p-2 bg-white text-black rounded-lg" @click="sendNotification">Send Notification</button>
    <button class="p-2 bg-white text-black rounded-lg" @click="enableSubscription">enable  Subscription</button>
  </div>
</template> 


