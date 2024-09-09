<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <router-link :to="{ name: 'welcome.index' }">
                                <img :src="logoUrl" style="width:65px" alt="Logo">
                            </router-link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <router-link v-if="user.type_user === 3 || user.type_user === 2"
                                :to="{ name: 'marcacoes.agendarMarcacao' }" active-class="border-b-2 border-indigo-400"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Agendar marcações
                            </router-link>
                            <router-link v-if="user.type_user === 2 || user.type_user === 1"
                                :to="{ name: 'marcacoes.list' }" active-class="border-b-2 border-indigo-400"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Marcações
                            </router-link>
                            <router-link v-if="user.type_user === 5" :to="{ name: 'empresasListaSocios' }"
                                active-class="border-b-2 border-indigo-400"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Lista de Sócios
                            </router-link>
                            <router-link v-if="user.type_user === 4" :to="{ name: 'empresasLista' }"
                                active-class="border-b-2 border-indigo-400"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Lista de Empresas Vinculadas
                            </router-link>

                        </div>
                    </div>
                    <div class="flex items-center">
                        <div>
                            <div>Hi, {{ user.name }}</div>
                            <div class="text-sm text-gray-500">{{ user.email }}</div>
                            <div class="text-sm text-gray-500">{{ user.nameType }}</div>
                        </div>
                    </div>
                    <button @click="logout" type="button"
                        class="item_button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent  font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 ml-4"
                        :class="{ 'opacity-25': processing }" :disabled="processing">
                        Log out
                    </button>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-0 px-4 sm:px-6 lg:px-8">
                <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ currentPageTitle }}
                </h4>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import useAuth from "../composables/auth";

export default {
    data() {
        return {
            logoUrl: '/img/quadro_logo_societario.png ', // Caminho relativo a partir da pasta public
            showDropdown: false,
            errors: {
                name: "",
            } // Armazena os erros de validação
        }
    },
    setup() {
        const { user, processing, logout } = useAuth()

        return { user, processing, logout }
    },
    computed: {
        currentPageTitle() {
            return this.$route.meta.title;
        }
    },
    methods: {
        getMetaTitle(routeName) {
            const route = this.$router.resolve({ name: routeName });
            return route.route.meta.title || 'Default Title'; // Retorna o título ou um título padrão
        }
    }
}
</script>
<style>
.item_button {
    background-color: #3E5C8C;
    /* Azul Cobalto */
    padding: 15px;
    text-align: center;
}

nav a {
    color: #D4D9E0;
    /* Prata Suave */
    margin: 0 15px;
    text-decoration: none;
    font-weight: bold;
}
</style>