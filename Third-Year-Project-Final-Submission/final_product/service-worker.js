"use strict";

console.log('SERVICE WORKER: executing.');
// Version number for the service worker
var version = 'V1::';

// The resources which will be cached by the service worker
// Here all files, etc... are being downloaded
var offlineNeeded = [
    '',
    'script.js'
];

// This is the install event which is used to show files while the user is offline
self.addEventListener("install", function(event) {
    console.log('SERVICE WORKER: install event in progress.');
    event.waitUntil(
        caches
        .open(version + 'fundamentals')
        .then(function(cache) {

            // add the resources in `offlineNeeded` to the cache, after making requests for them
            return cache.addAll(offlineNeeded);
        })
        .then(function() {
            console.log('SERVICE WORKER: installation finished');
        })
    );
});

// Fetches whenever a page controlled by the service worker requests a resource
self.addEventListener("fetch", function(event) {
    console.log('SERVICE WORKER: the fetch event is now in progress.');

    // Only getting the GET requests
    if (event.request.method !== 'GET') {
        console.log('SERVICE WORKER: the fetch event has been ignored.', event.request.method, event.request.url);
        return;
    }

    event.respondWith(
        caches
        .match(event.request)
        .then(function(cached) {
            var networked = fetch(event.request)
                // handle the network request with success and failure scenarios.
                .then(fetchedFromNetwork, unableToResolve)
                // catch errors on the fetchedFromNetwork handler
                .catch(unableToResolve);

            // Return the cached response straight away and fallback waiting on the network
            console.log('WORKER: fetch event', cached ? '(cached)' : '(network)', event.request.url);
            return cached || networked;

            function fetchedFromNetwork(response) {
                // Copy the reposonse before making a reply
                var cacheCopy = response.clone();

                console.log('SERVICE WORKER: fetch response from the network.', event.request.url);

                caches
                // We open a cache to store the response for this request.
                    .open(version + 'pages')
                    .then(function add(cache) {
                        cache.put(event.request, cacheCopy);
                    })
                    .then(function() {
                        console.log('SERVICE WORKER: fetch response has now been stored in the cache.', event.request.url);
                    });

                // Return the response
                return response;
            }

            // This is called when unable to make a response from the cache or network
            function unableToResolve() {
                console.log('SERVICE WORKER: the fetch request has failed in both the cache and the network.');
                // This is making a response for it
                return new Response('<h1>Service Unavailable</h1>', {
                    status: 503,
                    statusText: 'Service Unavailable',
                    headers: new Headers({
                        'Content-Type': 'text/html'
                    })
                });
            }
        })
    );
});

// This works after a service worker has successfully installed
self.addEventListener("activate", function(event) {
    console.log('SERVICE WORKER: the "activate" event is now in progress...');

    event.waitUntil(
        caches
        .keys()
        .then(function(keys) {
            return Promise.all(
                keys
                .filter(function(key) {
                    // Filter by keys that don't start with the latest version prefix!
                    return !key.startsWith(version);
                })
                .map(function(key) {
                    return caches.delete(key);
                })
            );
        })
        .then(function() {
            console.log('SERVICE WORKER: the "activate" event is now completed!');
        })
    );
});