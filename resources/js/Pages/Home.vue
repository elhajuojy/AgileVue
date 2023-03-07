<script>
import Layout from "../Shared/Layout.vue";

export default {
  // Using a render function...
  layout: (h, page) => h(Layout, [page]),

  // Using shorthand syntax...
  layout: Layout,
}
</script>

<script setup >



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
    <div>
        <h1 class="text-3xl font-bold">
            Home
        </h1>
    </div>

</template>

<style lang="scss" scoped>

</style>
