import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';


import App from './app.vue';
import BooksIndex from './books/index.vue';

// Define your routes
const routes = [
    {
        name: 'BooksIndex',
        path: '/',
        component: BooksIndex
    },
];

// Create the router instance
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Create and mount the root instance
createApp(App)
    .use(router)
    .mount('#app');
