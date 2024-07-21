<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16">
                    <div class="flex">
                        <!-- Logo -->
                        
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            
                        </div>
                    </div>
                    <div class="">
                        <a href="/">
                            <i class="fa fa-address-card fa-2x item-icon" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="flex ml-2">
                        <div>
                            <div class="text-xl text-black-500">Contas</div>
                            <div class="text-sm text-gray-500"></div>
                        </div>
                    </div >
                      
                         
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class=" text-xl text-gray-800 leading-tight">
                    {{ currentPageTitle }}
                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                            <table class="table-striped" table-striped>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Contas</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="conta in contas" :key="conta.conta_id">
                                    <td>{{ conta.conta_id }}</td>
                                    <td :class="{ 'item-excluido': conta.inativo === 1 }">{{ conta.conta }}</td>
                                    <td> 
                                        <button v-if="conta.inativo==1" @click="activeconta(conta.conta_id)" class="btn btn-success" title="Ativar usuário"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        <button v-else @click="desactiveconta(conta.conta_id)" class="btn btn-danger" title="Desativar usuário"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        <button @click="openModal(conta.conta,conta.conta_id)" class="btn btn-secondary ml-2" title="Editar usuário"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <Modal
                            :title="modalTitle"
                            :active_="showModal"
                            @update:active_="showModal = $event"
                            @confirm="handleConfirm"
                            >
                            <template #body1>
                                <div class="mb-3">
                                <label for="modalInput" class="form-label">Input</label>
                                <input type="text" class="form-control" id="modalInput" v-model="modalInput" required>
                                </div>
                            </template>
                            </Modal>
                    
                        </div>
                    </div>
                </div>
            </div>
          
        </main>
    </div>
</template>

<script>
import { onMounted } from 'vue';
import useContas from '@/composables/contas';
import Swal from 'sweetalert2';
import Modal from '../modal/EditConta.vue';

export default {
    
  name: 'ContasIndex',
  components:{
    Modal
  },
  setup() {
    const { contas, getContas, updateContas } = useContas();

    onMounted(async () => {
      await getContas();
    });

    const desactiveconta = async (id) => {
      try {
        await updateContas(id, 1);
        await getContas();
        Swal.fire({
          title: 'Desativado',
          text: 'Conta desativada com sucesso.',
          icon: 'success',
          confirmButtonText: 'OK'
        });
      } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
          Swal.fire({
            title: 'Error',
            text: error.response.data.message,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        } else {
          Swal.fire({
            title: 'Error',
            text: 'Erro desconhecido ao atualizar a conta.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      }
    };
    const activeconta = async (id) => {
      try {
        const result = await updateContas(id, 0);
        console.log(result)
        await getContas();
        Swal.fire({
          title: 'Ativada',
          text: 'Conta ativada com sucesso.',
          icon: 'success',
          confirmButtonText: 'OK'
        });
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
    };

    return {
      contas,
      desactiveconta,
      activeconta,
      showModal: false,
      modalName: '',
      modalInput: ''
    };

  },
  methods: {
        openModal(name, inputValue) {
            console.log("Modal opened with name:", name);
            console.log(this);
            this.modalName = name;
            this.modalInput = inputValue;
            this.showModal = true;
        },
        handleConfirm() {
        console.log('Confirmed with input:', this.modalInput);
        // Lógica para lidar com a confirmação
        }
    
  },
  

    
};
</script>

<style scoped>
/* Adicione seus estilos aqui */
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  border: 1px solid #ddd;
  padding: 8px;
}
th {
  background-color: #f4f4f4;
}
.modal {
  display: block;
}
</style>
<style src="./contas.css"></style>