export function formatDateTime(isoString) {
    const date = new Date(isoString);
  
    return date.toLocaleString("en-US", {
      month: "short",
      day: "2-digit",
      hour: "2-digit",
      minute: "2-digit",
      hour12: true,
    });
  }

  export function goBack() {
    window.history.back();
  }

  export function currentLocationMarker() {
    // Implementation for current location marker
    return `<div class="relative size-5 rounded-full border-2 border-green-200 bg-green-600""><div class="w-full h-full bg-green-300 rounded-full animate-ping"></div></div>`
  }
