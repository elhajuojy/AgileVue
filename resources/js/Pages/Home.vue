<script setup >
import Layout from '../Shared/Layout.vue';



defineProps({
    name: {
        type: String,
        required: true,
    },
    hobbies: {
        type: Array,
        required: true,
    },
})

</script>

<template>
    <Layout>
        <h1 class="text-3xl font-bold">
            Home
        </h1>

    </Layout>

</template>

<style lang="scss" scoped>

</style>
