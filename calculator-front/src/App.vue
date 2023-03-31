<template>
  <div id="app">
    <Navbar></Navbar>
    <router-view></router-view>
  </div>
</template>

<script>
import Navbar from './components/header/Navbar.vue';
export default {
  components: {
    Navbar
  },
  name: 'App',
}
</script>

<style>

</style>
