import { createRouter, createWebHistory } from "vue-router";

import AuthenticatedLayout from "../layouts/Authenticated.vue";
import GuestLayout from "../layouts/Guest.vue";

import PostsIndex from '../components/Posts/Index.vue'
import PostsCreate from '../components/Posts/Create.vue'
import PostsEdit from '../components/Posts/Edit.vue'
import Usuarios from '../Usuario/Usuarios.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'

const Home = { template: "<div>Home</div>" };
const About = { template: "<div>About</div>" };
const Product = { template: "<div>Product</div>" };
import LayoutComponent from '../layouts/Layout.vue';

// import AcessoIndex from '../components/AcessoIndex.vue';
// import MainApp from '../components/mainapp.vue';
// import ContasIndex from '../layouts/ContasIndex.vue';
// import CartaoIndex from '../Usuario/Cartao.vue';
// import Index from '../components/Posts/Index.vue';
// import AgendaMarcacoesLayout from '../layouts/marcacoes/AgendaMarcacoes.vue';
// import MarcacoesLayout from '../layouts/marcacoes/Marcacoes.vue';
// import WelcomeLayout from '../layouts/Welcome.vue';
// const ContasIndex = () => import('../layouts/ContasIndex.vue');
// const LayoutComponent = () => import('../layouts/Layout.vue');
const AcessoIndex = () => import('../components/AcessoIndex.vue');
const MainApp = () => import('../components/mainapp.vue');
const ContasIndex = () => import('../layouts/ContasIndex.vue');
const CartaoIndex = () => import('../Usuario/Cartao.vue');
const Index = () => import('../components/Posts/Index.vue');
const AgendaMarcacoesLayout = () => import('../layouts/marcacoes/AgendaMarcacoes.vue');
const MarcacoesLayout = () => import('../layouts/marcacoes/Marcacoes.vue');
const WelcomeLayout = () => import('../layouts/Welcome.vue');
//Empresas
const ConfirmationEmpresas = () => import('../layouts/confirmation/FormConfirmationEmpresas.vue');
const EmpresasListaSocios = () => import('../layouts/empresas/EmpresaListaSocios.vue');
//Sócios
const EmpresasLista = () => import('../layouts/socios/EmpresaLista.vue');
const ConfirmationSocios = () => import('../layouts/Welcome.vue');
const isAuthenticated = () => {
    const token = localStorage.getItem('authToken');
    return !!token;
}
const getToken = () => {
    const token = localStorage.getItem('jwt_token');
    const expirationTime = localStorage.getItem('jwt_token_expiration');
    
    if (!token || !expirationTime) {
        return null; // Não existe token ou timestamp de expiração
    }

    const currentTime = new Date().getTime();

    if (currentTime > expirationTime) {
        // O token expirou
        localStorage.removeItem('jwt_token');
        localStorage.removeItem('jwt_token_expiration');
        return null;
    }

    return token; // O token ainda é válido
}
function auth(to, from, next) {
    const token_verification = getToken();
    const loggIn = JSON.parse(localStorage.getItem('loggedIn'));
    // localStorage.setItem('user', JSON.stringify(updatedUser));
    const logusergIn = JSON.parse(localStorage.getItem('user'));
    if (loggIn && isAuthenticated && token_verification) {
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
        path: '/register',
        name: 'register',
        component: Register,
        
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
            { path: "/confirmation/empresas", name: 'confirmationEmpresa', component: ConfirmationEmpresas },
            { 
                path: "/empresas/empresasListaSocios", 
                name: 'empresasListaSocios', 
                component: EmpresasListaSocios,  
                meta: { title: 'Lista de Sócios' } 
            },
            { 
                path: "/empresas/empresasLista", 
                name: 'empresasLista', 
                component: EmpresasLista,  
                meta: { title: 'Lista de Empresas' } 
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

// Guard para verificar autenticação
router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isAuthenticated()) {
        next('/login'); // Redireciona para o login se não estiver autenticado
    } else {
        next();
    }
});

export default router;