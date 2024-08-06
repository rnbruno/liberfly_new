<template>
  <nav class="bg-white border-b border-gray-100 ">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
              <div class="flex">
                  <!-- Logo -->
                  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                      <router-link :to="{ name: 'login' }" active-class="border-b-2 border-indigo-400"
                          class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                          Login
                      </router-link>
                      <router-link :to="{ name: 'posts.create' }" active-class="border-b-2 border-indigo-400"
                          class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                          Register
                      </router-link>
                  </div>
              </div>
              <!-- Other navigation items can go here -->
          </div>
      </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
}
</script>
<style scoped>
/* Optional styles for the header */
</style>