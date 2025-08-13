<template>
  <div class="w-full h-[500px] rounded-md overflow-hidden max-w-sm mx-auto">
    <div id="map" class="w-full h-full"></div>
    <p class="text-center pt-2 text-sm text-gray-500">📍 {{ statusMessage }}</p>
</div>

<button @click="showNearbyWriters" class="fixe mt-5 bottom-4 right-4 bg-primary font-semibol px-4 py-2 w-full rounded-2xl text-black  shadow-lg hover:bg-secondary transition-colors duration-300">
  Search  Writers
</button>

</template>

<script setup>
import { onMounted, ref } from 'vue'
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import { currentLocationMarker as Marker } from "../helper.js";

const map = ref(null)
const statusMessage = ref('Locating...')
const pencilIcon = `<svg xmlns="http://www.w3.org/2000/svg" class='animate-bounce' width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#E2B714" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="56" stroke-dashoffset="56" d="M3 21l2 -6l11 -11c1 -1 3 -1 4 0c1 1 1 3 0 4l-11 11l-6 2"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="56;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M15 5l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="8;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" stroke-width="1" d="M6 15l3 3"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="6;0"/></path></g><path fill="#E2B714" fill-opacity="0" d="M17 4H20V7L9 18L6 15L17 4Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.8s" dur="0.15s" values="0;0.3"/></path></svg>`
const iconPencil = L.divIcon({
          html: pencilIcon,
          className: 'pencilIcon',
          iconSize: [10, 10]
        })
const iconMarker =  L.divIcon({
          html: Marker(), // use any html tag
          className: 'currentLocationMarker',
          iconSize: [56, 56]
        })        

  onMounted(() => {
  map.value = L.map('map').setView([12.9716, 77.5946], 13)

  L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
    attribution: null
  }).addTo(map.value)

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      position => {
        const { latitude, longitude } = position.coords
        statusMessage.value = `You are here 📍 (${latitude.toFixed(4)}, ${longitude.toFixed(4)})`

        // Set map view to user's location
        map.value.flyTo([latitude, longitude], 17, {
           animate: true,
           duration: 2,
           easeLinearity: 0.25
         })

        // Add marker for user's location
         L.marker([latitude, longitude],{ icon:iconMarker }).addTo(map.value).bindPopup("You")
        

      },
      error => {
        statusMessage.value = 'Failed to get your location 😢'
      }
    )
  } else {
    statusMessage.value = 'Geolocation is not supported by your browser.'
  }
})


// Store writer markers globally so we can open popups later
const writerMarkers = []

function showNearbyWriters() {
  // Remove previous markers from map
  writerMarkers.forEach(marker => marker.remove())
  writerMarkers.length = 0

  // Smooth fly to a central point
  map.value.flyTo([12.910506769622994, 77.55048668853563], 15, {
    animate: true,
    duration: 2,
    easeLinearity: 0.25
  })

  const writers = [
    {
      coords: [12.910506769622994, 77.55048668853563],
      label: 'Writer 1'
    },
    {
      coords: [12.910512007114686, 77.54610395085045],
      label: 'Writer 2'
    },
    {
      coords: [12.893113300787599, 77.54215166623553],
      label: 'Writer 3'
    }
  ]
// Add markers for each writer
  writers.forEach(writer => {
    const marker = L.marker(writer.coords, {
      icon: iconPencil
    }).addTo(map.value)

    marker.bindPopup(`<p class='text-black text-xs font-semibold'>${writer.label}</p>`, {
      autoClose: false,
      closeOnClick: false
    })

    writerMarkers.push(marker)
  })

  // Open all popups after 3 second
  setTimeout(() => {
    writerMarkers.forEach(marker => {
      const popup = marker.getPopup()
      if (popup && !popup.isOpen()) {
        marker.openPopup()
      }
    })
  }, 3000)
}


 
</script>

<style scoped>
#map {
  width: 100%;
  height: 100%;
}
</style>
