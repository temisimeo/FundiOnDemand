const CACHE_NAME = 'must-event-v1'; // Change this to 'v2' when you update your layout!
const ASSETS = [
    './',
    './index.html',
    './users.html',
    './style.css',
    './icons/logo.jpg'
];

// 1. Install & Skip Waiting
self.addEventListener('install', (event) => {
    self.skipWaiting(); 
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(ASSETS))
    );
});

// 2. ACTIVATE: This is the fix! It deletes old caches.
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.filter(key => key !== CACHE_NAME)
                    .map(key => caches.delete(key))
            );
        })
    );
    self.clients.claim();
});

// 3. Fetch (Network First Strategy)
self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request).catch(() => caches.match(event.request))
    );
});