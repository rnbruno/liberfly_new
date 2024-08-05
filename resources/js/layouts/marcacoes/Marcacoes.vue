<template>
    <div class="">

        <!-- Page Content -->
        <main>
            <div class="bg-white overflow-hidden shadow-sm min-w-full align-middle">
                <div class="row ">
                    <div class="col-4 offset-9 ">
                        <button @click="CreateMarcacao()" class="btn btn-secondary m-4"
                            title="Adicione Marcações">Criar Marcação</button>
                    </div>
                </div>


                <table style="width:755px" class="table table-striped min-w-full divide-y divide-gray-200 table-striped"
                    >
                    <thead class="thead-light">
                        <tr class="thead-light">
                            <th>Marcação</th>
                            <th>Médico Atribuído</th>
                            <th>Tipo Animal</th>
                            <th>Data da marcação</th>
                            <th>Reason</th>
                            <th>Notes</th>
                            <th class="text-center items-center justify-end ">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="marcacao in marcacoes" :key="marcacao.id">
                            <td class="text-center">{{ marcacao.id }}</td>
                            <td :class="{ 'item-excluido': marcacao.excluido == 1 }">
                                <div v-if="marcacao.medical_id == 0 && marcacao.excluido == 0"><button class="btn btn-success btn-sm items-center"
                                        @click="ModalAtribuir(marcacao.id, marcacao.marcacao_date, marcacao.type_animal_name)"
                                        title="Atribua a um médico">Atribuir</button>
                                 
                                    <ModalAtribuir  :isVisible="isModalVisible" @close="closeModal" :title="modalTitle"
                                        :initialInputValue="modalInputValue" :initialInputValue2="modalInputValue2"
                                        :initialInputValue3="modalInputValue3" :options="modalOptions"
                                        :initialOption="modalInitialOption" @confirm="confirmarAtribuir"
                                        :hiddenValue="marcacao.id">
                                        <template #bodyAtt>
                                            <div class="mb-3">
                                                <label for="modalInput" class="form-label">Name count</label>
                                                <input type="hidden" :value="hiddenValue" />
                                            </div>
                                        </template>
                                    </ModalAtribuir>
                                </div>
                               
                                <div v-else>{{ marcacao.medical_name }}</div>

                            </td>
                            <td :class="{ 'item-excluido': marcacao.excluido === 1 }" >{{ marcacao.type_animal_name }}</td>
                            <td>{{ formatDate(marcacao.marcacao_date) }}</td>
                            <td>{{ marcacao.reason }}</td>
                            <td>{{ marcacao.notes  }}</td>
                            <td class="items-center justify-end ">
                                <div v-if="marcacao.excluido == 1" class=""
                                    title="Excluído">Excluído</div>
                                <div v-else class="items-center justify-end ">

                                    <button @click.prevent="deleteMarcacao(marcacao.id)" class="btn btn-danger ml-2"
                                        title="Desativar marcação"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                    <button @click="desactiveconta()" class="btn btn-warning ml-2"
                                        title="Editar marcação"><i class="fa fa-trash"
                                            aria-hidden="true"></i>Edit</button>

                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>

            <button @click="openModal()">Open Modal</button>
            <Modal_e v-if="isModalVisible" @close="isModalVisible = false" :active_att="showModalAtt"
                @update:active_att="showModalAtt = $event">
                <h2>Modal Content</h2>
                <p>This is the content of the modal.</p>
            </Modal_e>
        </main>
    </div>
</template>

<script>
import { ref, computed, onMounted } from 'vue';
import useMarcacoes from '@/composables/marcacoes';
import useMedicals from '@/composables/medicos';
import Swal from 'sweetalert2';
import ModalAtribuir from '../../modal/AtribuirModal.vue';
import Modal_e from '../../modal/Modal_e.vue';
import { format } from 'date-fns';

export default {

    name: 'AgendarMarcacoes',
    components: {
        ModalAtribuir,
        Modal_e
    },
    data() {
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
            isModalVisible: false,
            modalInputValue: '',
            modalInputValue2: '',
            modalInputValue3: '',
            modalInitialOption: 1,
            hiddenValue: 'hidden_value',
            marcacaoId_: '',
        };
    },
    setup() {
        const { marcacao, marcacoes, getMarcacoes, updateMarcacoes, deleteMarcacao } = useMarcacoes();
        const { medical, medicals, getMedicals } = useMedicals();

        const modalOptions = ref([]);

        const setOptions = () => {
            // Assumindo que medicals é uma lista de objetos com id e name
            modalOptions.value = medicals.value.map(medical => ({
                value: medical.id,
                text: medical.name
            }));
        };

        onMounted(async () => {
            await getMarcacoes();
            await getMedicals();

            setOptions();
        });


        const desactiveconta = async (id) => {
            try {
                await deleteMarcacao(id);
                // await getContas();
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
        const atualizarMark = async (id) => {
            await getMarcacoes();
        }

        const confirmarAtribuir = async (payload) => {
            const { selectedOption, hiddenValue } = payload;
            updateMarcacoes(hiddenValue, selectedOption);
            await atualizarMark(hiddenValue);
        };

        onMounted(async () => {
            // Fetch marcacoes and medicals data here if needed
            // await getMarcacoes();
            // await getMedicals();
        });


        return {
            marcacoes,
            modalOptions,
            // modalInitialOption
            atualizarMark,
            confirmarAtribuir,
            desactiveconta,
            deleteMarcacao,
        };
    },
    methods: {
        formatDate(date) {
            return format(new Date(date), 'dd/MM/yyyy HH:mm');
        },
        ModalAtribuir(marcacaoId, date, name_animal) {
            this.modalTitle = `Marcação ID: ${marcacaoId}`;
            this.modalInputValue = 'Initial value'; // Substitua pelo valor desejado
            this.modalInputValue2 = date; // Substitua pelo valor desejado
            this.modalInputValue3 = name_animal; // Substitua pelo valor desejado
            this.isModalVisible = true;
            this.marcacaoId_ = marcacaoId;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        CreateMarcacao() {
            this.modalTitle = `Marcação ID: ${marcacaoId}`;
            this.modalInputValue = 'Initial value'; // Substitua pelo valor desejado
            this.modalInputValue2 = date; // Substitua pelo valor desejado
            this.modalInputValue3 = name_animal; // Substitua pelo valor desejado
            this.isModalVisible = true;
            this.marcacaoId_ = marcacaoId;
        },
        // async confirmarAtribuir(payload) {
        //     console.log('Received from modal:', payload);
        //     console.log('Confirmed with input:', this.modalInput, this.modalName);
        //     const { selectedOption } = payload;

        //     console.log('Selected Option:', selectedOption);
        //     // Lógica para lidar com a confirmação
        //     try {
        //         await this.update(selectedOption, 1);
        //         // const response = await axios.patch(`/api/contas/update-name/${this.modalInput}`, {
        //         //     conta: this.modalName, conta_id: this.modalInput
        //         // });
        //         // console.log('Item updated successfully:', response.data);
        //         Swal.fire({
        //             title: 'Medical atribuido',
        //             text: 'Marcação atribuida com sucesso.',
        //             icon: 'success',
        //             confirmButtonText: 'OK'
        //         });
        //         await this.atualizarMark();
        //     } catch (error) {
        //         if (error.response && error.response.data && error.response.data.message) {
        //             // Exibir SweetAlert de erro com a mensagem retornada pela API
        //             Swal.fire({
        //                 title: 'Error',
        //                 text: error.response.data.message,
        //                 icon: 'error',
        //                 confirmButtonText: 'OK'
        //             });
        //         } else {
        //             // Exibir mensagem de erro genérica
        //             Swal.fire({
        //                 title: 'Error',
        //                 text: 'Erro desconhecido ao atribuir medical.',
        //                 icon: 'error',
        //                 confirmButtonText: 'OK'
        //             });
        //         }
        //     }

        // },
        async handleConfirmAcount() {
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
        openModal(marcacaoId) {
            this.currentMarcacaoId = marcacaoId;
            this.showModalAtt = true;
        },
    }
}

</script>
<style>
.tela {
    width: 500px;
}
</style>
<style src="./marcacao.css"></style>