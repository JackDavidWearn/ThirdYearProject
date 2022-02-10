// Script to register a new service worker based on the tutorial from Paul Kinlan at Google, found at:
// https://developers.google.com/web/fundamentals/codelabs/offline
(function(){
    if ('serviceWorker' in navigator) {
        console.log('CLIENT: service worker registration in progress.');
        navigator.serviceWorker.register('service-worker.js').then(function() {
          console.log('CLIENT: service worker registration complete.');
        }, function() {
          console.log('CLIENT: service worker registration failure.');
        });
      } else {
        console.log('CLIENT: service worker is not supported.');
      }
})();