<template>
    <div>
        <ul v-for="history in $store.state.calculations.calculations" :key="history.id">
            <li>
                {{ history.expression }} = {{ history.result }}
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
            if (this.$store.state.calculations <= 0)
            {
                this.$store.dispatch('getCalculations');
            }
        }
    }
}
</script>

<style>

</style>