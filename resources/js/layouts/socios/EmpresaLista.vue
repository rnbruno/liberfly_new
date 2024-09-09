<template>
  <!-- <h2>Teste..</h2> -->
  <div class="card col-10 offset-1">
    <div class="card-body row">
      <h3 class="col-5"> Empresas Vinculadas</h3>
      <button type="button" style="color:aliceblue" class="btn btn-secondary col-2 offset-4"
               >Incluir Empresa </button>
    </div>
    <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center" scope="col">#</th>
            <th scope="col">C&oacute;d.</th>
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
            <td class="" :class="{'line-through': sociosEmpresa.status != 'Ativado'}">{{ sociosEmpresa.id }}</td>
            <td :class="{'line-through': sociosEmpresa.status != 'Ativado'}">{{ sociosEmpresa.empresas_name }}</td>
            <td>{{ sociosEmpresa.telefone }}</td>
            <td class="text-center"><button type="button" class="btn btn-warning m-1"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</button>
              <button type="button" class="btn btn-danger"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                @click="sendAjaxRequest(sociosEmpresa.id, sociosEmpresa.status)"
                v-if="sociosEmpresa.status == 'Ativado'" >Desativar</button>
              <button type="button" class="btn btn-success"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                @click="sendAjaxRequest(sociosEmpresa.id, sociosEmpresa.status)" v-else >Ativar</button>
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

export default {
  name: 'EmpresaLista',
  props: {
    // sociosEmpresas: Object
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
    return {
      sociosEmpresas: [],
      user,
      RegisterFormEmpresas,
    };
  },
  created() {
    this.fetchSociosEmpresas();
  },
  methods: {
    async fetchSociosEmpresas() {
      try {
        let userId = this.user;
        let userIditem = userId.id_int;
        let userType = userId.type_user;
        const response = await axios.get((`/api/empresasLista?user_id=${userIditem}&type=${userType}`));
        this.sociosEmpresas = response.data;
      } catch (error) {
        console.error('Erro ao buscar usuários:', error);
      }
    }
  }
};

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