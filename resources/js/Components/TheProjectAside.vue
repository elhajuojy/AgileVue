
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


const active  = 'active shadow bg-blue-300 text-white rounded-md p-2'


</script>
<template>
    <div class="overflow-hidden">
        <aside class="min-w-[20%] lg:min-w-[15%]  p-6 shadow aside    bg-white">
            <header class="flex gap-3 m-auto">
                <img :src="props.project.project_cover" class="w-8 m-auto my-2 h-8 rounded-full">
                <div class="flex-grow-1">
                    <h3 class="text-sm"> {{ props.project.name }} </h3>
                    <p class="text-sm text-gray-400"> {{  props.project.project_type }} </p>
                </div>
            </header>
            <section class="mt-10">
                <h3 class="text-xl font-bold mb-6">Planing</h3>
                <ul class="grid gap-3 board-actions ">
                    <li class="">

                        <Link :class="{active:$page.component === 'projects/board' }" :href="routes.board" >
                            <i class="fa-regular fa-chess-board"></i>
                            Board
                        </Link>
                    </li>
                    <li class="">

                        <Link :href="routes.backlog" :class="{active:$page.component === 'projects/backlog' }" >
                            <i class="fa-solid fa-file-invoice"></i>
                            Backlog
                        </Link>
                    </li>
                    <li>
                        <Link :href="routes.sprint" :class="{active:$page.component === 'projects/sprint' }">
                            <i class="fa-solid fa-table"></i>
                            Sprints
                        </Link>
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

.active{
    color: #3B82F6;
    font-weight: 600;
    border-radius: 0.5rem;
    padding: 0.5rem;
    background-color: #F3F4F6;

}

.aside{
    height: 100vh;
}

</style>
