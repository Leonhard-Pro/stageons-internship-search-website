

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('ServiceWorker.js')
        .then((sw) => console.log('Le Service Worker a été enregistrer', sw))
        .catch((err) => console.log('Le Service Worker est introuvable !!!', err));
}

self.addEventListener('activate', evt => {
    console.log('le Service Worker a été installé ');
});

//Installation du service worker
self.addEventListener('install', evt => {
    evt.waitUntil(caches.open(NomDuCache).then(cache => {
        cache.addAll(assets);
    })
    )

});

//fetch event afin de répondre quand on est en mode hors ligne.
self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.open('ma_sauvegarde').then(function (cache) {
            return cache.match(event.request).then(function (response) {
                return response || fetch(event.request).then(function (response) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});




/*
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