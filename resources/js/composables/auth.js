import { ref, reactive, inject, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import { AbilityBuilder, Ability } from "@casl/ability";
import { ABILITY_TOKEN } from "@casl/vue";
import Swal from "sweetalert2";

const user = reactive({
    name: "",
    email: "",
});

export default function useAuth() {
    const processing = ref(false);
    const validationErrors = reactive({
        requiredFields: null,
        passwordMismatch: null,
    });
    const router = useRouter();
    const swal = inject("$swal");
    const ability = inject(ABILITY_TOKEN);
    const passwordMismatch = ref(false);
    const rawPhoneEmpresa = ref(""); // Armazena o número não formatado
    const formattedPhoneEmpresa = ref(""); // Armazena o número formatado
    const rawPhoneSocio = ref(""); // Armazena o número não formatado
    const formattedPhoneSocio = ref(""); // Armazena o número formatado

    const loginForm = reactive({
        email: "",
        password: "",
        api_key: "",
        remember: false,
    });

    const RegisterFormEmpresas = reactive({
        name: "",
        phone: "",
        email: "",
        password: "",
        password2: "",
        hiddenEmpresas: 1,
        confirmation: false,
    });

    const RegisterFormSocios = reactive({
        name: "",
        phone: "",
        email: "",
        password: "",
        password2: "",
        hiddenSocios: 2,
        confirmation: false,
    });
    const loggedIn = ref(false);
    const user = ref({
        name: "",
        email: "",
        nameType: "",
        type_user: "",
    });
    const authToken = ref(false);

    onMounted(() => {
        // Recupera o estado de login do localStorage
        const loggIn_ = JSON.parse(localStorage.getItem("loggedIn"));

        // Verifica se o usuário está logado
        if (loggIn_) {
            // Recupera os dados do usuário do localStorage
            const logusergIn_ = JSON.parse(localStorage.getItem("user"));
            console.log(logusergIn_);
            if (logusergIn_) {
                // Atualiza a variável reativa com os dados do usuário
                user.value = {
                    name: logusergIn_.name || "",
                    id: logusergIn_.id || "",
                    email: logusergIn_.email || "",
                    nameType: logusergIn_.nameType || "",
                    type_user: logusergIn_.type_user || "",
                    id_int: logusergIn_.id_int || "",
                };
                loggedIn.value = true;
            }
        }
    });

        const submitLogin = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.value = {};

        axios
            .post("api/login", loginForm)
            .then(async (response) => {
                if (response.data.status == true) {
                    loginUser(response);
                    setToken(response);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro no Login',
                        text: response.message,
                        footer: 'Verifique seus dados e tente novamente'
                    });
                }
            })
            .catch((error) => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                    // Exibindo o SweetAlert com o erro
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro no Login',
                        text: error.response.data.message || 'Ocorreu um erro durante o login. Verifique as credenciais e tente novamente.',
                        footer: 'Verifique seus dados e tente novamente'
                    });
                } else {
                    // Caso o erro não tenha resposta do servidor
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro inesperado',
                        text: 'Algo deu errado. Por favor, tente novamente mais tarde.',
                    });
                }
            })
            .finally(() => (processing.value = false));
    };

    const checkEmptyFields = (campos_verificacao) => {
        const requiredFields = ['nome', 'email', 'password', 'password2', 'phone', 'confirmation'];
        for (let field of requiredFields) {
            console.log(field);
            if (!RegisterFormEmpresas[field]) {
                console.log(!RegisterFormEmpresas[field]);
                return `O campo ${field} é obrigatório.`;
            }
        }
        return null;
    };

    const RegisterEmpresas = async () => {
        if (processing.value) return;

        processing.value = true;
        validationErrors.requiredFields = checkEmptyFields();

        validationErrors.value = {};

        let field1 = RegisterFormEmpresas.password;
        let field2 = RegisterFormEmpresas.password2;

        await validateFields(field1, field2);

        if (!passwordMismatch.value) {
            // Process form submission
            try {

                axios
                    .post("api/register", RegisterFormEmpresas)
                    .then(async (response) => {
                        if (response.data.status == true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Empresa Cadastrada',
                                text: response.data.message,
                                showCancelButton: true,  // Mostra o botão de cancelamento
                                confirmButtonText: 'Ir para o login',
                                cancelButtonText: 'Continuar no cadastro',
                            }).then((result) => {
                        
                                if (result.isConfirmed) {
                                    loginForm.email = RegisterFormEmpresas.email;
                                    loginForm.api_key = RegisterFormEmpresas.password;
                                    submitLogin();
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    window.location.href = `/`;
                                }else{
                                    window.location.href = `/`;
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro ao cadastrar empresa',
                                text: response.message,
                                footer: 'Verifique seus dados e tente novamente'
                            });
                        }
                    })
                    .catch((error) => {
                        if (error.response?.data) {
                            validationErrors.value = error.response.data.errors;
                            // Exibindo o SweetAlert com o erro
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro ao cadastrar empresa',
                                text: error.response.data.message || 'Ocorreu um erro durante o login. Verifique as credenciais e tente novamente.',
                                footer: 'Verifique seus dados e tente novamente'
                            });
                        } else {
                            // Caso o erro não tenha resposta do servidor
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro inesperado',
                                text: 'Algo deu errado. Por favor, tente novamente mais tarde.',
                            });
                        }
                    })
                    .finally(() => (processing.value = false));

            } catch (error) {
                // Tratar erros da requisição
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao enviar o formulário.',
                });
            }
        } else {
            // Exibir alerta com SweetAlert2 se as senhas não coincidirem
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'As senhas não coincidem.',
            });
            validationErrors.value.passwordMismatch = 'As senhas não coincidem.';
            processing.value = false;
        }
    };

    const RegisterSocios = async (response) => {
        console.log("press registersocios");
    };

    const validateFields = async (field1, field2) => {
        passwordMismatch.value = field1 !== field2;
    };

    const loginUser = async (response) => {
        user.name = response.data.user.name;
        user.email = response.data.user.email;
        user.nameType = response.data.user.nameType;
        user.id_int = response.data.user.id_int;
        user.type_user = response.data.user.type_user;
        user.confirmation = response.data.user.confirmation;
        authToken.value = response.data.authorization.token;
        const loginTime = new Date().getTime();
        const updatedUser = {
            name: user.name,
            email: user.email,
            nameType: user.nameType,
            type_user: user.type_user,
            loginTime: loginTime,
            id_int: user.id_int,
            confirmation: user.confirmation,
            token: user.token,
        };
        console.log(updatedUser);

        const token = authToken;
        // Armazena o usuário no localStorage
        localStorage.setItem("user", JSON.stringify(updatedUser));
        localStorage.setItem("loggedIn", JSON.stringify(true));
        localStorage.setItem("authToken", JSON.stringify(token));
        await getAbilities();
        if(updatedUser.type_user == 5 && updatedUser.confirmation){
            await router.push({ name: "confirmationEmpresa" });
        }else{
            await router.push({ name: "welcome.index" });
        }
        // await router.push({ name: "welcome.index" });
    };

    const setToken = (response) => {

        // if (response.data && response.data.authorization && response.data.authorization.token) {
        if (response?.data?.authorization?.token){
            // A variável existe e você pode usá-la
            const token_ = response.data.authorization.token;
            const expirationTime = new Date().getTime() + 10 * 60 * 1000; // 10 minutos em milissegundos
            localStorage.setItem('jwt_token', token_);
            localStorage.setItem('jwt_token_expiration', expirationTime);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Gravar token.',
            });
            return 0;
        }
        
    }

    const getUser = () => {
        axios.get("/api/user").then((response) => {
            loginUser(response);
        });
    };

    const logout = async () => {
        if (processing.value) return;

        processing.value = true;
        localStorage.removeItem("user");
        localStorage.removeItem("loggedIn");
        localStorage.removeItem("authToken");
        localStorage.removeItem('jwt_token');
        localStorage.removeItem('jwt_token_expiration');
        try {
            const response = await axios.get("/logout");
            localStorage.removeItem("user");
            localStorage.removeItem("loggedIn");
            localStorage.removeItem("authToken");
            localStorage.removeItem('jwt_token');
            localStorage.removeItem('jwt_token_expiration');
            await router.push({ name: "login" });
        } catch (error) {
            console.error("Logout error:", error.response);
            swal({
                icon: "error",
                title: error.response.status,
                text: error.response.statusText,
            });
        } finally {
            processing.value = false;
        }
    };

    const getAbilities = async () => {
        axios.get("/api/abilities").then((response) => {
            const permissions = response.data;
            const { can, rules } = new AbilityBuilder(Ability);

            can(permissions);

            ability.update(rules);
        });
    };

    // Watcher para observar mudanças no número bruto e formatar
    watch(rawPhoneEmpresa, (newVal) => {
        console.log(newVal);
        formattedPhoneEmpresa.value = formatPhone(newVal);
    });

    watch(rawPhoneSocio, (newVal) => {
        formattedPhoneSocio.value = formatPhone(newVal);
    });

    const formatPhone = (phone) => {
        // Remove todos os caracteres que não são dígitos
        phone = phone.replace(/\D/g, '');

        console.log(phone);

        // Formata o número (XX) XXXXX-XXXX
        if (phone.length <= 10) {
            // Para números no formato (XX) XXXX-XXXX
            phone = phone.replace(/^(\d{2})(\d{4})(\d+)/, "($1) $2-$3");
        } else {
            // Para números no formato (XX) XXXXX-XXXX
            phone = phone.replace(/^(\d{2})(\d{5})(\d+)/, "($1) $2-$3");
        }

        return phone;
    };

    function checkLoginStatus() {
        const loginData = JSON.parse(localStorage.getItem("user"));
        if (!loginData) {
            // Não há dados de login no localStorage
            return false;
        }

        const currentTime = new Date().getTime();
        const loginTime = loginData.loginTime;
        const sessionDuration = 60 * 60 * 1000; // 1 hora

        if (currentTime - loginTime > sessionDuration) {
            // Tempo de sessão expirado
            localStorage.removeItem("user");
            return false;
        }

        return true;
    }
    return {
        loginForm,
        validationErrors,
        processing,
        submitLogin,
        RegisterEmpresas,
        RegisterSocios,
        user,
        getUser,
        logout,
        getAbilities,
        checkLoginStatus,
        validateFields,
        RegisterFormEmpresas,
        RegisterFormSocios,
        rawPhoneEmpresa,
        rawPhoneSocio,
        formattedPhoneSocio,
        formattedPhoneEmpresa,
    };
}
