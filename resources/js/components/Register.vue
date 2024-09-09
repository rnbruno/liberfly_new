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
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 form-register">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 ">

                            <div class="container mt-5">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" :class="{ active: activeTab === 'empresas' }"
                                            @click="setTab('empresas')" style="color:gray"><i style="color:gray"
                                                class="fas fa-business-time"></i> Empresa</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" :class="{ active: activeTab === 'socios' }"
                                            @click="setTab('socios')" style="color:gray"><i style="color:gray"
                                                class="fas fa-user-tie"></i>
                                            Sócio</a>
                                    </li>
                                </ul>

                                <!-- Tab content -->
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade" :class="{ 'show active': activeTab === 'empresas' }"
                                        aria-labelledby="home-tab">
                                        <form @submit.prevent="RegisterEmpresas">
                                            <h3>Profile da Empresa</h3>
                                            <p>Cadastre sua empresa.</p>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="nomeEmpresa" v-model="RegisterFormEmpresas.name"
                                                    required placeholder="Informe o nome da Empresa"
                                                    class="form-control" />
                                                <label class="form-label" for="nomeEmpresa">Nome da Empresa*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" id="emailEmpresa"
                                                    v-model="RegisterFormEmpresas.email" required
                                                    placeholder="Informe o email da empresa" class="form-control" />
                                                <label class="form-label" for="emailempresa">Email*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="phoneEmpresa"
                                                    v-model="RegisterFormEmpresas.phone" v-phone-maskEmpresa required
                                                    placeholder="Informe o telefone da empresa" class="form-control" />
                                                <label class="form-label" for="phoneEmpresa">Telefone*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="passwordEmpresa"
                                                    placeholder="Digite sua senha"
                                                    v-model="RegisterFormEmpresas.password" required
                                                    class="form-control" />
                                                <label class="form-label" for="passwordEmpresa">Senha*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="password2Empresa"
                                                    v-model="RegisterFormEmpresas.password2" required
                                                    placeholder="Repita sua senha" class="form-control" autocomplete="new-password"/>
                                                <label class="form-label" for="password2Empresa">Repita a Senha*</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                                    <input class="form-check-input me-3" type="checkbox" value=""
                                                        id="confimatioEmpresa" required
                                                        v-model="RegisterFormEmpresas.confirmation">
                                                    <label class="form-check-label" for="form2Example3">
                                                        *Aceito os <a href="#!" class=""><u>termos e condições</u></a>
                                                        do
                                                        site.
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="hidden" v-model="RegisterFormEmpresas.hiddenEmpresa" />

                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-lg mb-1"
                                                :class="{ 'opacity-25': processing }" :disabled="processing">Cadastrar
                                                Empresa</button>


                                        </form>
                                    </div>
                                    <div class="tab-pane fade" :class="{ 'show active': activeTab === 'socios' }">
                                        <form @submit.prevent="RegisterSocios">
                                            <h3>Profile Sócios</h3>
                                            <p>Sócio, se cadastre.</p>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="nomeSocio" v-model="RegisterFormSocios.name"
                                                    required placeholder="Informe o nome" class="form-control" />
                                                <label class="form-label" for="nomeSocio">Nome do Sócio*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" v-model="RegisterFormSocios.email" id="emailSocio"
                                                    required placeholder="Informe o email" class="form-control" />
                                                <label class="form-label" for="emailSocio">Email*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="passwordSocio" placeholder="Digite sua senha"
                                                    v-model="RegisterFormSocios.password" required
                                                    class="form-control" />
                                                <label class="form-label" for="passwordSocio">Senha*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" id="password2Socio"
                                                    v-model="RegisterFormSocios.password2" required
                                                    placeholder="Repita sua senha" class="form-control" />
                                                <label class="form-label" for="password2Socio" autocomplete="new-password">Repita a Senha*</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" v-model="formattedPhoneSocio" id="phoneSocio"
                                                    placeholder="Informe o telefone" required class="form-control" />
                                                <label class="form-label" for="phoneSocio">Telefone*</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                                    <input class="form-check-input me-3" type="checkbox" value=""
                                                        required id="form2Example3c">
                                                    <label class="form-check-label" for="form2Example3">
                                                        *Aceito os <a href="#!" class=""><u>termos e condições</u></a>
                                                        do
                                                        site.
                                                    </label>
                                                </div>
                                            </div>

                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-lg mb-1">Cadastrar Sócios</button>

                                        </form>
                                    </div>

                                </div>
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
import Navbar from '../layouts/Navbar.vue';
import Footer from '../layouts/Footer.vue';
import useAuth from '../composables/auth'
export default {
    name: 'Login',
    data() {
        return {
            logoUrl: '/img/quadro_logo_societario.png', // Caminho relativo a partir da pasta public
            showDropdown: false,
            activeTab: 'empresas',

        }
    },
    setup() {
        const { formattedPhoneEmpresa, formattedPhoneSocio, RegisterFormEmpresas, RegisterFormSocios, loginForm, validationErrors, processing, submitLogin, RegisterEmpresas, RegisterSocios } = useAuth()

        return { formattedPhoneEmpresa, formattedPhoneSocio, RegisterFormEmpresas, RegisterFormSocios, loginForm, validationErrors, processing, submitLogin, RegisterEmpresas, RegisterSocios }
    },
    directives: {
        phoneMaskEmpresa: {
            beforeMount(el) {
                el.addEventListener('input', () => {
                    let x = el.value.replace(/\D/g, '');
                    if (x.length > 11) {
                        x = x.slice(0, 11); 
                    }

                    el.value = x.replace(/^(\d{2})(\d{5})(\d+)/, '($1) $2-$3');

                });
            }
        }
    },
    components: {
        Navbar,
        Footer
    },
    methods: {
        setTab(tab) {
            this.activeTab = tab;  // Atualiza a aba ativa
            this.blinkTab = tab;   // Define a aba para piscar

            // Remove o efeito de piscar após 1 segundo (ajustar conforme necessário)
            setTimeout(() => {
                this.blinkTab = null;
            }, 1000);  // Delay de 1 segundo
        }
    }

}
</script>
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.form-register {
    max-width: 580px;
    padding: 15px;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.font-6 {
    font-size: 12px;
}

.login-text {
    color: #607D94;
    /* Prata Suave */
    margin: 0 15px;
    text-decoration: none;
    font-weight: bold;
}

.item_button {
    background-color: #3E5C8C;
    /* Azul Cobalto */
    padding: 15px;
    text-align: center;
}

.nav-link {
    cursor: pointer;
    /* Muda o cursor para um ponteiro ao passar o mouse */
    transition: background-color 0.3s;
    color: gray;
    /* Adiciona uma transição suave na cor de fundo */
}

.nav-link.active {
    color: #3179c2 !important;
    /* Adiciona uma cor de fundo para a aba ativa */
}

.tab-content {
    position: relative;
}

.tab-content.blink {
    animation: blink-animation 1s step-start infinite;
}

@keyframes blink-animation {
    0% {
        background-color: #ffffff;
    }

    50% {
        background-color: #f8d7da;
    }

    /* Cor de fundo para o efeito de piscar */
    100% {
        background-color: #ffffff;
    }
}
</style>