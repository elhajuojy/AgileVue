<script setup>
defineProps({
    name: {
        type: String,
        required: true,
    },
})

</script>

<template>
    <div>
        <h1>
            Welcome {{ name }}!
        </h1>
    </div>
</template>

<style lang="scss" scoped>

</style>
