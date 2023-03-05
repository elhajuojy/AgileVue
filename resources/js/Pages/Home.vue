<script setup >

import TheNavVue from "../Shared/TheNav.vue"

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
    <div class="container grid place-items-center divide-red-50  shadow-orange-50  m-auto text-center">
        <TheNavVue />
        <h1 class="" >
            Home
        </h1>
    </div>
</template>

<style lang="scss" scoped>

</style>
