
<script setup>
import Layout from "../Shared/Layout.vue";
import {Link} from "@inertiajs/vue3"
defineProps({
    time: {
        type: String,
        required: true,
    },
})

</script>

<template>
    <Layout>
        <h1 class="font-bold text-3xl">Users</h1>
        <div style="margin-top: 700px">
            <p>the current time {{ time  }}</p>
            <Link href="/users"
            class="hover:text-purple-100 text-blue-500"
            preserve-scroll
            >
            Refersh
            </Link>
        </div>
    </Layout>
</template>

<style lang="scss" scoped>

</style>
