<script setup>
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
        <h1>
            Welcome {{ name }}!
        </h1>
        <ul>
            <li v-for="hobby in hobbies" :key="hobby">
                {{ hobby }}
            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>

</style>
