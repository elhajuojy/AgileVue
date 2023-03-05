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
    <div class="container grid place-items-center divide-red-50 bg-primary shadow-orange-50 text-purple-50 m-auto text-center">
        <h1 class="" >
            Welcome {{ name }}!
        </h1>
        <ul class="">
            <li v-for="hobby in hobbies" :key="hobby">
                {{ hobby }}
            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>

</style>
