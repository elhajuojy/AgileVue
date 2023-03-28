
<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    project : Object
})


const routes = {
    board : "/projects/"+props.project.id+"/board",
    backlog : "/projects/"+props.project.id+"/backlog",
    sprint : "/projects/"+props.project.id+"/sprint",

}

</script>
<template>
    <div class="">
        <aside class="min-w-[20%] lg:min-w-[15%]  p-6 shadow aside   bg-white">
            <header class="flex gap-3 m-auto">
                <img :src="props.project.project_cover" class="w-8 m-auto my-2 h-8 rounded-full">
                <div class="flex-grow-1">
                    <h3 class="text-sm"> {{ props.project.name }} </h3>
                    <p class="text-sm text-gray-400"> {{  props.project.project_type }} </p>
                </div>
            </header>
            <section class="mt-10">
                <h3 class="text-xl font-bold mb-6">Planing</h3>
                <ul class="grid gap-3 board-actions">
                    <li class="">
                        <i class="fa-regular fa-chess-board"></i>
                        <Link :href="routes.board">Board</Link>
                    </li>
                    <li class="">
                        <i class="fa-solid fa-file-invoice"></i>
                        <Link href="/backlog">Backlog</Link>
                    </li>
                    <li>
                        <i class="fa-solid fa-table"></i>
                        <Link href="/sprints">Sprints</Link>
                    </li>
                    <li>
                        <i class="fa-solid fa-clipboard-list-check"></i>
                        <Link href="/components" >components</Link>
                    </li>
                    <li>
                        <i class="fa-solid fa-code-compare"></i>
                        <Link href="/versions" >Versions</Link>
                    </li>
                </ul>
                <v-divider :thickness="3"  color="success" ></v-divider>
                <h3 class="text-xl font-bold mb-6 mt-6">More Actions</h3>

                <ul class="mt-auto">
                    <li>
                        <i class="fa-regular fa-gear"></i>
                        <Link href="/sprints">Project Settings</Link>
                    </li>

                </ul>





            </section>

        </aside>
    </div>
</template>


<style scoped>

li{
    display: flex;
    gap: 0.75rem;
    color: blue;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}


.aside{
    height: 100vh;
}

</style>
