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

