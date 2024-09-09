

// require('./bootstrap');
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import {createApp, onMounted} from 'vue'
import * as LaravelVuePagination from 'laravel-vue-pagination';
import router from './router';
import VueSweetalert2 from "vue-sweetalert2";
import useAuth from "./composables/auth";
import { abilitiesPlugin } from '@casl/vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import vuetify from '../js/vuetify/index';

import '@fortawesome/fontawesome-free/css/all.min.css'; // Importa o CSS do Font Awesome
import { InertiaProgress } from '@inertiajs/progress';

// // import MyComponent from './MyComponent.vue';
// const { router } = () => import('vue-sweetalert2');
// const { useAuth } = () => import('./composables/auth');
// const { VueSweetalert2 } = () => import('vue-sweetalert2');
// const { vuetify } = () => import('../js/vuetify/index');
// const { abilitiesPlugin } = () => import('@casl/vue');
// const { library } = () => import('@fortawesome/fontawesome-svg-core');

// // Use dynamic import:
// const { FontAwesomeIcon } = () => import('@fortawesome/vue-fontawesome');

// // Importar ícones específicos
// const { InertiaProgress } = () => import('@inertiajs/progress');
// const { ability } = () => import('./services/ability');
import ability from './services/ability';

const app = createApp({
    // setup() {
    //     const { getUser } = useAuth()
    //     onMounted(getUser)
    // }
})
app.component('font-awesome-icon', FontAwesomeIcon);
app.use(router)
app.use(VueSweetalert2)
app.use(library)
app.use(FontAwesomeIcon)
app.use(vuetify)
app.use(abilitiesPlugin, ability)
app.component('Pagination', LaravelVuePagination)
app.use(InertiaProgress);
app.mount('#app')

// Imports dinâmicos precisam ser resolvidos com `await` ou `.then()`
// (async () => {
//     const {createApp, onMounted} = await import('vue');
//     const {LaravelVuePagination} = await import('laravel-vue-pagination');
//     const { router } = await import('./router');
//     const { useAuth } = await import('./composables/auth');
//     const { VueSweetalert2 } = await import('vue-sweetalert2');
//     const { vuetify } = await import('../js/vuetify/index');
//     const { abilitiesPlugin } = await import('@casl/vue');
//     const { library } = await import('@fortawesome/fontawesome-svg-core');
//     const { FontAwesomeIcon } = await import('@fortawesome/vue-fontawesome');
//     const { InertiaProgress } = await import('@inertiajs/progress');
//     const { ability } = () => import('./services/ability');
    
//     const app = createApp({
//         // setup() {
//         //     const { getUser } = useAuth()
//         //     onMounted(getUser)
//         // }
//     });

//     app.component('font-awesome-icon', FontAwesomeIcon);
//     app.use(router);
//     app.use(VueSweetalert2);
//     app.use(library);
//     app.use(vuetify);
//     // app.use(abilitiesPlugin, ability);
//     app.component('Pagination', LaravelVuePagination)
//     app.use(InertiaProgress);
//     app.mount('#app'); // Certifique-se de que o app seja montado
// })();
