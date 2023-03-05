
<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    active: Boolean,
})
</script>

<template>
    <Link class="hover:text-purple-100" :class="{ 'text-blue-500 bold underline': active }">
    <slot />
    </Link>
</template>


<style lang="scss" scoped></style>∂
