<template>
  <!-- <h2>Teste..</h2> -->
  <div class="card col-10 offset-1">
    <div class="card-body row">
      <h3 class="col-5"> Sócios Vinculados</h3>
      <button type="button" style="color:aliceblue" class="btn btn-secondary col-2 offset-4"
        @click="ModalAtribuir(1, 2, 3)">Incluir Sócio</button>

      <ModalAtribuir :isVisible="isModalVisible" @close="closeModal" :title="modalTitle"
        :initialInputValue="modalInputValue" :initialInputValue2="modalInputValue2"
        :initialInputValue3="modalInputValue3" :options="modalOptions" :initialOption="modalInitialOption"
        @confirm="confirmarAtribuir">
        <template #bodyAtt>
          <div class="mb-3">
          </div>
        </template>
      </ModalAtribuir>
    </div>
    <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center" scope="col">#</th>
            <th scope="col">C&oacute;d.</th>
            <th scope="col">Sócio</th>
            <th scope="col">Empresa de</th>
            <th scope="col">Telefone</th>
            <th class="text-center" scope="col text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(sociosEmpresa, index) in sociosEmpresas" :key="index">
            <td class="text-center">
              <div class="badge text-bg-secondary">{{ index + 1 }}</div>
            </td>
            <td class="text-center" :class="{ 'line-through': sociosEmpresa.status != 'Ativado' }">{{ sociosEmpresa.id
              }}
            </td>
            <td class="text-justify" :class="{ 'line-through': sociosEmpresa.status != 'Ativado' }">{{
              sociosEmpresa.user_name }}</td>
            <td :class="{ 'line-through': sociosEmpresa.status != 'Ativado' }">{{ sociosEmpresa.empresas_name }}</td>
            <td>{{ sociosEmpresa.telefone }}</td>
            <td class="text-center"><button type="button" class="btn btn-warning m-1"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                disabled>Editar</button>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                @click="sendAjaxRequest(sociosEmpresa.id, sociosEmpresa.status)"
                v-if="sociosEmpresa.status == 'Ativado'" disabled>Desativar</button>
              <button type="button" class="btn btn-success"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                @click="sendAjaxRequest(sociosEmpresa.id, sociosEmpresa.status)" v-else disabled>Ativar</button>
            </td>
          </tr>

        </tbody>
      </table>

    </div>
  </div>

</template>

<script>
import { ref, reactive, inject, onMounted, watch } from "vue";
import CryptoJS from 'crypto-js';
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import Swal from "sweetalert2";
import axios from 'axios';
import ModalAtribuir from '../../modal/AdicionarSocio.vue';


export default {
  name: 'EmpresaListaSocios',
  props: ['isVisible', 'title', 'initialInputValue', 'initialInputValue2', 'initialInputValue3', 'options', 'initialOption',],

  components: {
    ModalAtribuir,
  },
  data() {
    const user = JSON.parse(localStorage.getItem("user"));
    const RegisterFormEmpresas = reactive({
      name: "",
      phone: "",
      email: "",
      password: "",
      password2: "",
      hiddenEmpresas: 1,
      confirmation: false,
    });
    const isModalOpen = ref(false);
    // const socios = ref({})
    // const socio = ref({
    //   id_int: '',
    //   name: '',
    // });
    // Armazena a lista de sócios
    const selectedOption = ref(null); // Armazena o valor selecionado
    // const loadSocios = async () => {
    //   try {
    //     const response = await axios.get('/api/socios'); // Substitua pela URL da sua API
    //     socios.value = response.data; // Atualiza a lista de sócios
    //   } catch (error) {
    //     console.error('Erro ao carregar os sócios:', error);
    //   }
    // };
    const addItem = () => {
      // Lógica para adicionar o item
      console.log('Item Added:', selectedOption.value);

      // Fechar o modal após adicionar o item
      closeModal();
    };

    onMounted(() => {
      // loadSocios();
    });

    return {
      modalTitle: '',
      showModal: false,
      showModalAdd: false,
      showModalAtt: false,
      isModalVisible: false,
      modalTitleAdd: '',
      modalTitleAtt: '',
      modalType: '',
      modalTypeAtt: '',
      modalName: '',
      modalInput: Array,
      modalButton: Array,
      modalAtribuir_: Array,
      currentPageTitle: 'Título da Página Atual', // Defina a propriedade aqui
      modalInputValue: '',
      modalInputValue2: '',
      modalInputValue3: '',
      modalInitialOption: 1,
      marcacaoId_: '',
      isModalOpen,
      // sociosEmpresas: [],
      addItem,
      user,
      selectedOption: this.initialOption,
      RegisterFormEmpresas,
    };
  },
  setup() {
    const socios = ref([]); // Defina uma referência para os sócios
    let sociosEmpresas = ref([]); 
    const modalOptions = ref([]);
    const isLoading = ref(false);
    const validationErrors = ref({});
    // Exemplo de como popular `socios` (você pode substituir com sua chamada de API ou dados reais)
    const fetchSocios = async () => {
      try {
        const response = await axios.get('/api/socios'); // Assumindo que você busca os sócios via API
        socios.value = response.data; // Preencha `socios` com os dados da API
        setOptions(); // Popula `modalOptions` após receber os sócios
      } catch (error) {
        console.error('Erro ao buscar sócios:', error);
      }
    };

    const userId = ref(null);

    // Função para buscar o ID do usuário na sessão
    const getUserIdFromSession = () => {
      const storedUser = JSON.parse(localStorage.getItem("user"));
      if (storedUser && storedUser.id_int) {
        userId.value = storedUser.id_int;
      }
    };

    // Chama a função para obter o usuário ao montar o componente
    getUserIdFromSession();


    const setOptions = () => {
      // Aqui, você mapeia os sócios para criar opções de modal
      modalOptions.value = socios.value.map(socio => ({
        value: socio.id_int,
        text: socio.name
      }));
    };
    const updateMarcacoes = async (id, status) => {
      if (isLoading.value) return;

      let userIditem = userId.value;
      isLoading.value = true;
      validationErrors.value = {};
      axios
        .put(`/api/socio/update/${id}`, { id: userIditem, id_int: status })
        .then(() => {
          swal({
            icon: "success",
            title: "Atribuição realizada com sucesso",
          });
        })
        .catch((error) => {
          if (error.response?.data) {
            validationErrors.value = error.response.data.errors;
          }
        })
        .finally(() => (isLoading.value = false));
    };

    onMounted(() => {
      fetchSocios(); // Chama a função de busca quando o componente é montado
    });

    onMounted(async () => {
      // await getMarcacoes();
      // await getMedicals();
      setOptions();
    });
    const atualizarTelaSocioEmpresas = async (id) => {

      try {
        console.log(id);
        let userIditem = id;
        let userType = "212";
        let item1 = await axios.get((`/api/socios_empresa?user_id=${userIditem}&type=${userType}`));
        sociosEmpresas = item1.data;
      } catch (error) {
        console.error('Erro ao buscar usuários:', error);
      }

    }
    const confirmarAtribuir = async (payload, user) => {
      const { selectedOption, hiddenValue } = payload;
      updateMarcacoes(hiddenValue, selectedOption);
      let userIditem = userId.value;
      await atualizarTelaSocioEmpresas(userIditem);
    };
    return {
      modalOptions,
      // modalInitialOption
      confirmarAtribuir,
      atualizarTelaSocioEmpresas,
      sociosEmpresas

    };
  },
  created() {
    this.fetchSociosEmpresas(this.user.id_int);
  },
  mounted() {
    this.user = JSON.parse(localStorage.getItem("user"));
  },
  methods: {
    async fetchSociosEmpresas(id) {
      try {

        let userIditem = id;
        let userType = "33@1";
        const response = await axios.get((`/api/socios_empresa?user_id=${userIditem}&type=${userType}`));
        this.sociosEmpresas = response.data;
      } catch (error) {
        console.error('Erro ao buscar usuários:', error);
      }
    },

    openModal(name, inputValue) {
      console.log("Modal opened with name:", name);
      console.log(this);
      this.modalTitle = "Edit Acount";
      this.modalName = name;
      this.modalInput = inputValue;
      this.showModal = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
    ModalAtribuir(marcacaoId, date, name_animal) {
      this.modalTitle = `Marcação ID: ${marcacaoId}`;
      this.modalInputValue = 'Initial value'; // Substitua pelo valor desejado
      this.modalInputValue2 = date; // Substitua pelo valor desejado
      this.modalInputValue3 = name_animal; // Substitua pelo valor desejado
      this.isModalVisible = true;
      this.marcacaoId_ = marcacaoId;
    },
    async handleConfirm() {
      console.log('Confirmed with input:', this.modalInput, this.modalName);
      // Lógica para lidar com a confirmação
      try {
        const response = await axios.patch(`/api/contas/update-name/${this.modalInput}`, {
          conta: this.modalName, conta_id: this.modalInput
        });
        console.log('Item updated successfully:', response.data);
        Swal.fire({
          title: 'Count edit',
          text: 'Conta editada com sucesso.',
          icon: 'success',
          confirmButtonText: 'OK'
        });
        await this.atualizarCount();
      } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
          // Exibir SweetAlert de erro com a mensagem retornada pela API
          Swal.fire({
            title: 'Error',
            text: error.response.data.message,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        } else {
          // Exibir mensagem de erro genérica
          Swal.fire({
            title: 'Error',
            text: 'Erro desconhecido ao atualizar a conta.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      }
    },
  },
}

</script>

<style scoped>
/* Seus estilos aqui */
text-justify {
  text-align: justify;
}

.line-through {
  text-decoration: line-through;
}
</style>