<template>
    <div class="flex items-center justify-center">
        <ul>
            <li v-for="history in $store.state.calculator.calculations.calculations" :key="history.id"
                class="m-6 text-3xl">
                <span>
                    {{ history.expression }} = {{ history.result }}    
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    mounted() {
        this.getHistory();
    },
    methods: {
        getHistory() {
            if (this.$store.state.calculator.calculations.length <= 0)
            {
                this.$store.dispatch('getCalculations');
            }
        }
    }
}
</script>

<style>

</style>