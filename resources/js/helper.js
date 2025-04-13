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