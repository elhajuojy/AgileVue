<script setup >

// version 0.9.1

import TheNavVue from "../Shared/TheNav.vue"
import '@shoelace-style/shoelace/dist/components/qr-code/qr-code.js';
import '@shoelace-style/shoelace/dist/components/input/input.js';

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
        <h1 class="" >
            Home
        </h1>

        <TheNavVue />
        <sl-input maxlength="255" clearable label="Value" v-model="qrCode"></sl-input>

        <sl-qr-code :value="qrCode"></sl-qr-code>
    </div>
</template>

<style lang="scss" scoped>

</style>
