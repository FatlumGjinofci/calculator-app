<template>
     <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
            <!-- <img class="mx-auto h-12 w-auto" src="../../../assets/img/logo.png" alt="Logo"> -->
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Login
            </h2>
            
            </div>
            <form @submit.prevent="login" class="mt-8 space-y-6">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" v-model="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-gray-800 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" v-model="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-gray-800 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
            </div>
            <div v-if="errors" class="py-2">
                <span class="text-red-500 font-semibold">
                    {{ errors }}
                </span>
                <!-- <span v-for="error in errors" :key="error.id">
                    <span v-for="err in error" :key="err.id">
                        <span class="text-red-600 font-semibold">
                            {{ err }} <br />
                        </span>
                    </span>
                </span> -->
            </div>
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: lock-closed -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                Login
                </button>
            </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            errors: ''
        }
    },
    methods: {
        login() {
            this.$store
                .dispatch("login", {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                // console.log(response);
                this.errors = response.data.message;
                if (!this.errors) { 
                    // console.log(this.$route.query.redirect);
                    if (!this.$route.query.redirect) {
                        this.$router.push("/");
                    } 
                    else {
                        this.$router.push(this.$route.query.redirect);
                    }
                }
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.message
                });
        },
    }
}
</script>

<style>

</style>