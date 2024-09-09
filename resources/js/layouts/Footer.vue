<template>
  <footer class="footer py-3 my-4 b">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="footer_text">Home</a></li>
      <li class="nav-item"><a href="#" class="footer_text">Features</a></li>
      <li class="nav-item"><a href="#" class="footer_text">Pricing</a></li>
      <li class="nav-item"><a href="#" class="footer_text">FAQs</a></li>
      <li class="nav-item"><a href="#" class="footer_text">About</a></li>
    </ul>
    <p class="text-center ">{{systemNameInc}}</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  data() {
        return {
            systemNameInc: import.meta.env.VITE_NAME_SISTEMA_INC,
        }
    },

}
</script>
<style>
footer {
  background-color: #1A2B49;
  /* Azul Noturno */
  color: #ffffff !important;
  /* Cinza Metálico */
  text-align: center;
  padding: 20px 0;
  margin-top: 50px;
}
.footer_text {
    color: #D4D9E0; /* Prata Suave */
    margin: 0 15px;
    text-decoration: none;
    font-weight: bold;
}
</style>