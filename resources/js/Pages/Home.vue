
<script setup >
import { Head} from "@inertiajs/vue3"



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
    <Head>
        <!-- <title>AgileVue - Home</title> -->
        <meta name="description" content="this is changes Home description" head-key="description">
    </Head>
    <div>
        <h1 class="text-3xl font-bold">
            Home
        </h1>
    </div>

</template>

<style lang="scss" scoped>

</style>
