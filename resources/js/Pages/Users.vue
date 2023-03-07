<script>
import Layout from "../Shared/Layout.vue";

export default {
  // Using a render function...
  layout: (h, page) => h(Layout, [page]),

  // Using shorthand syntax...
  layout: Layout,
}
</script>

<script setup>

import {Link} from "@inertiajs/vue3"



defineProps({
    time: {
        type: String,
        required: true,
    },
})

</script>

<template>
    <Head>
        <title>Users </title>
    </Head>
    <div>
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
    </div>
</template>

<style lang="scss" scoped>

</style>
