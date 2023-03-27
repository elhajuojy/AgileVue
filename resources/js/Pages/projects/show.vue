

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import { Head } from '@inertiajs/vue3';
import {onMounted} from "vue";

const props = defineProps({
    project : Object
})


onMounted(() => {
    console.log(props.project)
});

</script>


<script>

export default {
    layout : AuthenticatedLayout
}

</script>

<template>
    <Head title="Project" />
    <div>

            <section class="text-black flex m-auto">
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
                <main class="flex-grow-1 text-center">
                    <h1 class="text-3xl font-bold">
                        {{ props.project.name }}
                    </h1>
                    <p class="text-gray-500">
                        {{ props.project.description }}
                    </p>
                </main>
            </section>
    </div>
</template>

<style lang="scss" scoped>

</style>
