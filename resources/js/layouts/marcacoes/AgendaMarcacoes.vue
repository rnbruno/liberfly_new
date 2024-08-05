<template>
    <main>


        <div class="row g-5">
            <div class="col-md-12">
                <form class="needs-validation">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>

                        </div>

                        <div class="col-6">
                            <label for="username" class="form-label">Nome do Animal</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="username" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">Email <span
                                    class="text-body-secondary"></span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">

                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">Idade <span
                                    class="text-body-secondary"></span></label>
                            <input type="email" class="form-control" id="int" placeholder="2">
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Sintomas</label>
                            <input type="text" class="form-control" id="address" placeholder="Inform os sintomas"
                                required>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Address 2 <span
                                    class="text-body-secondary">(Optional)</span></label>
                            <input type="datetime-local" class="form-control" id="address2"
                                placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Tipo Animal</label>
                            <select class="form-select" id="country" required>
                                <option>United States</option>
                            </select>
                            <select class="form-control" v-model="selectedOption">
                                <option v-for="option in options" :key="option.value" :value="option.value">
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </main>
</template>

<script>
import { ref, computed, onMounted } from 'vue';
import useMarcacoes from '@/composables/marcacoes';
import useMedicals from '@/composables/medicos';
import useHorariosDisponiveis from '@/composables/horariosDisponiveis';
import Swal from 'sweetalert2';
import ModalAtribuir from '../../modal/AtribuirModal.vue';
import Modal_e from '../../modal/Modal_e.vue';
import { format } from 'date-fns';

export default {

    name: 'Marcacoes',
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
        const { horariosDisponiveis, getHorariosDisponiveis } = useHorariosDisponiveis();

        const modalOptions = ref([]);

        const setOptions = () => {
            // Assumindo que medicals é uma lista de objetos com id e name
            modalOptions.value = getHorariosDisponiveis.value.map(horariosDisponivel => ({
                value: horariosDisponivel.id,
                text: horariosDisponivel.hora_inicio
            }));
        };

        onMounted(async () => {
            await getMarcacoes();
            await getMedicals();
            await getHorariosDisponiveis();

            setOptions();
        });



        onMounted(async () => {
            // Fetch marcacoes and medicals data here if needed
            // await getMarcacoes();
            // await getMedicals();
        });


        return {
            marcacoes,
            modalOptions,
            // modalInitialOption

            getHorariosDisponiveis
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