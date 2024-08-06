import { ref, reactive, inject, onMounted } from "vue";
import { useRouter } from "vue-router";
import { AbilityBuilder, Ability } from "@casl/ability";
import { ABILITY_TOKEN } from "@casl/vue";

const user = reactive({
    name: "",
    email: "",
});

export default function useAuth() {
    const processing = ref(false);
    const validationErrors = ref({});
    const router = useRouter();
    const swal = inject("$swal");
    const ability = inject(ABILITY_TOKEN);

    const loginForm = reactive({
        email: "",
        password: "",
        remember: false,
    });
    const loggedIn = ref(false);
    const user = ref({
        name: "",
        email: "",
        nameType: "",
        type_user: "",
    });

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
            .post("/login", loginForm)
            .then(async (response) => {
                loginUser(response);
            })
            .catch((error) => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors;
                }
            })
            .finally(() => (processing.value = false));
    };

    const loginUser = async (response) => {
        user.name = response.data.name;
        user.email = response.data.email;
        user.nameType = response.data.nameType;
        user.id_int = response.data.id_int;
        user.type_user = response.data.type_user;
        const loginTime = new Date().getTime();
        const updatedUser = {
            name: user.name,
            email: user.email,
            nameType: user.nameType,
            type_user: user.type_user,
            loginTime: loginTime,
            id_int: user.id_int,
        };

        // Armazena o usuário no localStorage
        localStorage.setItem("user", JSON.stringify(updatedUser));

        localStorage.setItem("loggedIn", JSON.stringify(true));
        await getAbilities();
        await router.push({ name: "welcome.index" });
    };

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
        try {
            const response = await axios.post("/logout");
            console.log("Logout successful:", response.data);
            localStorage.removeItem("user");
            localStorage.removeItem("loggedIn");
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
        user,
        getUser,
        logout,
        getAbilities,
        checkLoginStatus
    };
}
