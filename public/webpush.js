self.addEventListener('push', function(event) {
  console.log('Push event received:', event);
  const data = event.data.json();

  const options = {
    body: 'New offere form browriters.com',
    icon: './favicon.ico', 
    badge: './avicon.ico',
    data: {
      url: '/'
    }
  };

  event.waitUntil(
    self.registration.showNotification(data.title, options)
  );
}
);