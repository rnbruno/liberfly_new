
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useMarcacoes() {
    const marcacoes = ref({})
    const marcacao = ref({
        id: '',
        animals_use: '',
        medical_id: '',
        reason: '',
        notes: '',
        data_formacao: ''
    })
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getMarcacoes = async () => {
        try {
            let response = await axios.get('/api/marcacoes/recepcionista');
            marcacoes.value = response.data;
        } catch (error) {
            console.error('An error occurred while fetching Marcacoes:', error);
            // Aqui você pode adicionar lógica para tratar o erro, por exemplo, mostrar uma mensagem ao usuário
        }
    }

    const storeMarcacoest = async (login) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        let serializedPost = new FormData()
        for (let item in post) {
            if (post.hasOwnProperty(item)) {
                serializedPost.append(item, post[item])
            }
        }

        axios.post('/api/posts', serializedPost)
            .then(response => {
                router.push({name: 'posts.index'})
                swal({
                    icon: 'success',
                    title: 'Post saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    // const updateMarcacoes = async (id, status) => {
    //     error.value = ''
    //     console.log(id, status);
        // hash = CryptoJS.MD5(id).toString(CryptoJS.enc.Hex)
        // try {
        //     await axios.patch(`/api/marcacoes/${id}`, { conta_id: id, inativo: status })
        //     // await router.push({ name: 'companies.index' })
        // } catch (e) {
        //     if (error.response && error.response.data && error.response.data.message) {
        //         Swal.fire({
        //             title: 'Error',
        //             text: error.response.data.message,
        //             icon: 'error',
        //             confirmButtonText: 'OK'
        //         });
        //     } else {
        //         Swal.fire({
        //             title: 'Error',
        //             text: 'Unknown error occurred while updating the item.',
        //             icon: 'error',
        //             confirmButtonText: 'OK'
        //         });
        //     }
        // }
    // },
    const updateMarcacoes = async (id, status) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        axios.put(`/api/marcacoes/update/${id}`, { id: id, medical_id: status })
            .then(response => {
                swal({
                    icon: 'success',
                    title: 'Atribuição realizada com sucesso'
                });
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }
     const deleteMarcacao = async (id) => {
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.put(`/api/marcacoes/excluido/${id}` , { id: id,})
                        .then(response => {
                           
                            swal({
                                icon: 'success',
                                title: 'Marcação deleted successfully'
                            })
                            getMarcacoes()
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })

    }

    return {
        marcacoes,
        getMarcacoes,
        updateMarcacoes,
        deleteMarcacao,
       
    }
}
