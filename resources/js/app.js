// import './bootstrap';

// import { createApp, h } from 'vue';
// import { createInertiaApp } from '@inertiajs/vue3';
// import { InertiaProgress } from '@inertiajs/progress';


// createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     return pages[`./Pages/${name}.vue`]
//   },
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el)
//   },
// })

// InertiaProgress.init();


// require('./bootstrap');

// import { createApp, h, onMounted } from 'vue';
// import { createInertiaApp } from '@inertiajs/vue3';
// import { InertiaProgress } from '@inertiajs/progress';
// import LaravelVuePagination from 'laravel-vue-pagination';
// import VueSweetalert2 from "vue-sweetalert2";
// import useAuth from "./Pages/composables/auth";
// import { abilitiesPlugin } from '@casl/vue';
// import ability from './Pages/services/ability';
// import Select2 from 'vue3-select2-component';
// import router from './routes/index'; // Certifique-se de que o arquivo router.js existe

// createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     return pages[`./Pages/${name}.vue`]
//   },
//   setup({ el, App, props, plugin }) {
//     const app = createApp({ 
//       render: () => h(App, props),
//       setup() {
//         const { getUser } = useAuth()
//         onMounted(getUser)
//       }
//     });

//     app.use(plugin);
//     app.use(router);
//     app.use(VueSweetalert2); // Uso do plugin VueSweetalert2
//     app.use(abilitiesPlugin, ability); // Uso do plugin @casl/vue
//     app.component('Pagination', LaravelVuePagination); // Registro do componente
//     app.component('Select2', Select2);
//     app.mount(el);
//   },
// })

// InertiaProgress.init();


// require('./bootstrap');
import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import {createApp, onMounted} from 'vue'
// import LaravelVuePagination from 'laravel-vue-pagination';
import AcessosIndex from './components/AcessoIndex.vue';
import router from './router'
import VueSweetalert2 from "vue-sweetalert2";
import useAuth from "./composables/auth";
import { abilitiesPlugin } from '@casl/vue';
// import ability from './Pages/services/ability';
// import Select2 from 'vue3-select2-component';


const app = createApp({
    // setup() {
    //     const { getUser } = useAuth()
    //     onMounted(getUser)
    // }
    components:{
      AcessosIndex
    }
})
app.use(router)
app.use(VueSweetalert2)
// app.use(abilitiesPlugin, ability)
// app.component('Pagination', LaravelVuePagination)
// app.component('Select2', Select2)
app.mount('#app')