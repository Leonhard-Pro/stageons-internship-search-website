/*
this.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open('v1').then(function (cache) {
            return cache.addAll([
                '/index.php',
                'controllers/login.php',
                'models/userlogin.php',
                'views/login/index.php',
            ]);
        })
    );
});


this.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request).catch(function () {
            return fetch(event.request).then(function (response) {
                return caches.open('v1').then(function (cache) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});
*/




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

document.cookie = 'Service Workers=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC'; 

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


