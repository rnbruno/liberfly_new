import { createRouter, createWebHistory } from "vue-router";

import AuthenticatedLayout from "../layouts/Authenticated.vue";
import GuestLayout from "../layouts/Guest.vue";

import PostsIndex from '../components/Posts/Index.vue'
import PostsCreate from '../components/Posts/Create.vue'
import PostsEdit from '../components/Posts/Edit.vue'
import Usuarios from '../Usuario/Usuarios.vue'
import Login from '../components/Login.vue'

const Home = { template: "<div>Home</div>" };
const About = { template: "<div>About</div>" };
const Product = { template: "<div>Product</div>" };
import LayoutComponent from '../layouts/Layout.vue';

import AcessoIndex from '../components/AcessoIndex.vue';
import MainApp from '../components/mainapp.vue';
import ContasIndex from '../layouts/ContasIndex.vue';
import CartaoIndex from '../Usuario/Cartao.vue';
import Index from '../components/Posts/Index.vue';
import AgendaMarcacoesLayout from '../layouts/marcacoes/AgendaMarcacoes.vue';
import MarcacoesLayout from '../layouts/marcacoes/Marcacoes.vue';
import WelcomeLayout from '../layouts/Welcome.vue';

function auth(to, from, next) {
    const loggIn = JSON.parse(localStorage.getItem('loggedIn'));
    // localStorage.setItem('user', JSON.stringify(updatedUser));
    const logusergIn = JSON.parse(localStorage.getItem('user'));
    if (loggIn) {
        next()
    }else{
        if (to.name == 'login'){
            next({name: 'login'});
        }else if (to.name == 'logout'){
            next({name: 'logout'});
        }else{
           next({name: 'layout'});
        }
    }
}


const routes = [
    {
        path: '/',
        name: 'layout',
        component: GuestLayout,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        
    },    
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {
                path: '/',
                name: 'welcome.index',
                component: WelcomeLayout,
                meta: { title: 'Welcome', }
            },
            {
                path: '/posts/create',
                name: 'posts.create',
                component: PostsCreate,
                meta: { title: 'Add new post' }
            },
            {
                path: '/marcacoes/agendarMarcacao',
                name: 'marcacoes.agendarMarcacao',
                component: AgendaMarcacoesLayout,
                meta: { title: 'Agendar Marcações' }
            },
            {
                path: '/marcacoes/list',
                name: 'marcacoes.list',
                component: MarcacoesLayout,
                meta: { title: 'Verificar Marcações' }
            },
            { path: "/", name: 'home', component: GuestLayout },
            { path: "/acessosIndex", name: 'acesso.index', component: AcessoIndex },
            { path: "/about", name: 'about', component: About },
            { path: "/product", component: Product },
            { path: "/dasboard", component: Product },
            { path: "/contas", name: 'conta',  component: ContasIndex },
            { path: "/cartao", name: 'cartaoIndex', component: CartaoIndex },
            { path: "/index", name: 'index', component: Index }
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;