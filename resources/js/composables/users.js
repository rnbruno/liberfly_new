
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useUsers() {
    localStorage.removeItem("user");
    localStorage.removeItem("loggedIn");

    const logins = ref({})
    const users = ref({})
    const login = ref({
        email: '',
        password: '',
        remember: ''
    })
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getUsers = async (login) => (
        page = 1,
        email = '',
        password = '',
    ) => {
        axios.get('/api/user?email=' + email +
            '&password=' + password )
            .then(response => {
                logins.value = response.data;
            })
    }

    const getUser = async (login) => {
        axios.get('/api/user/' + email)
            .then(response => {
                logins.value = response.data.data;
            })
    }

    const storePost = async (login) => {
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

    const updatePost = async (login) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/posts/' + post.id, post)
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

    const deletePost = async (login) => {
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getPosts()
                            router.push({name: 'posts.index'})
                            swal({
                                icon: 'success',
                                title: 'Post deleted successfully'
                            })
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
        getUsers,
        getUser,
        storePost,
        updatePost,
        deletePost,
        validationErrors,
        isLoading
    }
}
