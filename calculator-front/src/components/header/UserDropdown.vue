<template>
    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <router-link v-if="!loggedIn" :to="{ name: 'register'}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
          Register
        </router-link>
        <router-link v-if="!loggedIn" :to="{ name: 'login'}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
          Login
        </router-link>
        <button v-else @click="logout" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
          Logout
        </button>
    </div>
  </template>
  
  <script>
  import axios from 'axios'
  
  export default {
    data() {
      return {
  
      }
    },
    computed: {
      loggedIn() {
        return this.$store.getters.loggedIn;
      },
    },
    methods: {
      logout() {
        axios.defaults.headers.common["Authorization"] =
          "Bearer " + localStorage.getItem("access_token");
    
        this.$store.dispatch("destroyToken").then(() => {
          this.$router.push("/login").catch(()=>{});
          // location.reload();
        });
      }
    }
  }
  </script>
  
  <style>
  
  </style>