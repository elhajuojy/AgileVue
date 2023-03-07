
<script setup>
import TheNavVue from "../Shared/TheNav.vue"
import {Link} from "@inertiajs/vue3"
defineProps({
    time: {
        type: String,
        required: true,
    },
})

</script>

<template>
    <div class="text-center ">
        <h1>Users</h1>
        <TheNavVue />
        <div style="margin-top: 1440px">
            <p>the current time {{ time  }}</p>
            <Link href="/users"
            class="hover:text-purple-100 text-blue-500"
            preserve-scroll
            >
            Refersh
            </Link>
        </div>

    </div>
</template>

<style lang="scss" scoped>

</style>
