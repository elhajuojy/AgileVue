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
</script>


<template>
    <Head>
        <title> Settings</title>
    </Head>
    <div>
        <div>
            <h1 class="font-bold text-3xl">Settings</h1>
        </div>
    </div>
</template>



<style lang="scss" scoped>

</style>
