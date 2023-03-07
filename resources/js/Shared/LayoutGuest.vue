
<script setup>
import { Head } from '@inertiajs/vue3';



</script>

<template>
    <Head>
        <title>Guest  Layout</title>
    </Head>
    <div>
        <header class="bg-gray-100 p-6 flex justify-between">
            <h1 class="font-bold text-2xl">Guest  Layout</h1>
            <TheNav/>
        </header>
        <slot />

    </div>
</template>

<style lang="scss" scoped>

</style>
