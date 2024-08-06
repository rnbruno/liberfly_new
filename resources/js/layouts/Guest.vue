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
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                                <h1 class="display-4 fw-normal text-body-emphasis">Bem-vindo ao Patusco</h1>
                                <p class="fs-5 text-body-secondary">Na Patusco, estamos dedicados a oferecer um atendimento veterinário excecional para os nossos amigos de quatro patas. O nosso compromisso é proporcionar cuidados de saúde de alta qualidade, com uma abordagem personalizada e carinhosa para cada animal que atendemos..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
            logoUrl: '/img/logo.jpg', // Caminho relativo a partir da pasta public
            showDropdown: false
        }
    },
    components: {
        Navbar,
        Sidebar,
        Footer
    }
}
</script>