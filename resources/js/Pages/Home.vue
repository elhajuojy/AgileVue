
<script setup >


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
    <Head>
        <!-- <title>AgileVue - Home</title> -->
        <meta name="description" content="this is changes Home description" head-key="description">
    </Head>
    <div>
        <h1 class="text-3xl font-bold">
            Home
        </h1>
        <sl-input maxlength="255" clearable label="Value" v-model="qrCode"></sl-input>

        <sl-qr-code :value="qrCode"></sl-qr-code>
        <sl-color-picker :swatches.prop="mySwatches" />

    </div>

</template>

<style  scoped>
.container {
    max-width: 400px;
    margin: 0 auto;
  }

  sl-input {
    margin: var(--sl-spacing-large) 0;
  }


</style>
