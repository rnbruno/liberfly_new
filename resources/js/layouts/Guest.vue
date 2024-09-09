<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="/">
                                <img :src="logoUrl" style="width:65px" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <Navbar />
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main class="banner_sistema">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                                <h1>Bem-vindo ao {{ systemName}}</h1>
                                <p class="fs-5 text-body-secondary"> {{systemName2}} de uma empresa é um dos pilares fundamentais que define sua estrutura interna e administrativa. Ele se refere à composição dos sócios ou acionistas que possuem participação na empresa, bem como às suas respectivas responsabilidades e direitos. O quadro societário também esclarece quem são os tomadores de decisão e as proporções das participações de cada sócio no capital social da empresa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
   
    <div class="container text-center">
        <p>Gerencie todas as informações societárias das empresas em um só lugar.</p>
    </div>

    <Footer />
</template>
<script>
// import { RouterView } from 'vue-router';
import Navbar from '../layouts/Navbar.vue';
import Footer from './Footer.vue';
import Sidebar from './Sidebar.vue';

export default {
    name: 'Guest',
    data() {
        return {
            logoUrl: '/img/quadro_logo_societario.png', // Caminho relativo a partir da pasta public
            bannersistem: '/img/bussiness_modern.jpg',
            showDropdown: false,
            systemName: import.meta.env.VITE_NAME_SISTEMA,
            systemName2: import.meta.env.VITE_NAME_SISTEMA_2,
        }
    },
    components: {
        Navbar,
        Sidebar,
        Footer
    }
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #1A2B49; /* Azul Noturno */
    color: #F5F5F5; /* Branco Quebrado */
}

header {
    background-color: #607D94; /* Azul Acinzentado */
    padding: 20px;
    text-align: center;
    color: #F5F5F5;
}

h1 {
    font-size: 2.5rem;
    margin: 0;
}

.banner_sistema {
    text-align: center;
    padding: 50px 20px;
    background-image: url('/img/bussiness_modern.jpg'); /* Substitua pelo caminho da sua imagem */
    background-size: cover; /* Faz com que a imagem cubra todo o container */
    background-position: center; /* Centraliza a imagem dentro do container */
    background-repeat: no-repeat; /* Impede a repetição da imagem */
    position: relative; /* Garante que o conteúdo seja posicionado corretamente dentro do container */
}

.container p {
    font-size: 1.25rem;
    color: #A6B0C3; /* Cinza Metálico */
}

</style>