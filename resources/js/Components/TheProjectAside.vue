
<script setup>

const props = defineProps({
    project : Object
})


</script>
<template>
    <div>
        <aside class="min-w-[20%] lg:min-w-[15%]  p-6 shadow h-screen bg-white">
            <header class="flex gap-3 m-auto">
                <img :src="props.project.project_cover" class="w-8 m-auto my-2 h-8 rounded-full">
                <div class="flex-grow-1">
                    <h3> {{ props.project.name }} </h3>
                    <p class="text-gray-400"> {{  props.project.project_type }} </p>
                </div>
            </header>
            <section class="mt-10">
                <h3 class="text-xl font-bold mb-2">Planing</h3>
                <ul class="grid gap-3">
                    <li>
                        <a href="" class="text-gray-500 hover:text-gray-600 mt-12 py-6">Board</a>
                        <font-awesome-icon icon="fa-solid fa-game-board" />
                    </li>
                    <li>
                        <a href="" class="text-gray-500 hover:text-gray-600 mt-12 py-6">Backlog</a>
                        <font-awesome-icon icon="fa-solid fa-game-board" />
                    </li>
                    <li>
                        <a href="" class="text-gray-500 hover:text-gray-600 mt-12 py-6">Board</a>
                        <font-awesome-icon icon="fa-solid fa-game-board" />
                    </li>
                    <li>
                        <a href="" class="text-gray-500 hover:text-gray-600 mt-12 py-6">Backlog</a>
                        <font-awesome-icon icon="fa-solid fa-game-board" />
                    </li>
                </ul>
            </section>

        </aside>
    </div>
</template>


<style lang="scss" scoped>

</style>
