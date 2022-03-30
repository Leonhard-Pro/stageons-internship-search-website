
this.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('v1').then(function(cache) {
        return cache.addAll([
          'index.php',
          'views/login/index.php',
        ]);
      })
    );
  });




/*
if('serviceWorker' in navigator){
    navigator.serviceWorker.register('ServiceWorker.js')
    .then( (sw) => console.log('Le Service Worker a été enregistrer', sw))
    .catch((err) => console.log('Le Service Worker est introuvable !!!', err));
   }

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/serviceworker.js');
};

self.addEventListener("install", (event) => {
    console.log("service worker installed");
});

self.addEventListener("activate", (event) => {
    console.log("service worker activated");
    self.clients.claim();
});


self.addEventListener("fetch", (event) => {
    event.respondWith(caches.open("cache-dynamique").then(cache =>
        cache.match(event.request).then(cResponse => {
            if (cResponse)
                return cResponse;
            return fetch(event.request).then(fResponse =>
                cache.put(event.request, fResponse.clone())
                    .then(() => fResponse)
            );
        })
    ));
});
*/