
<script setup>
import { Link } from '@inertiajs/vue3'
import SettingsMenu from "@/Components/Project/ProjectSettingsMenu.vue";
import ProjectSettingsMenu from "@/Components/Project/ProjectSettingsMenu.vue";
import {reactive} from "vue";


const state = reactive({
    show : true
})
const props = defineProps({
    project : Object
})


    // /projects/{project}/sprints
const routes = {
    board : "/projects/"+props.project.id+"/board",
    backlog : "/projects/"+props.project.id+"/backlog",
    sprint : "/projects/"+props.project.id+"/sprints",
    versions : "/projects/"+props.project.id+"/versions",
}


const active  = 'active  shadow bg-blue-300 text-white rounded-md p-2 transition shadow duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110'


</script>
<template>
    <div v-if="state.show" class="min-w-[15%] relative  max-w-[20%]">
        <aside  class="p-3 shadow aside fixed z-40   bg-white">
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
                    <li :class="{active:$page.component === 'projects/board' }">

                        <Link  :href="routes.board" >
                            <i class="fa-regular fa-chess-board"></i>
                            Board
                        </Link>
                    </li>
                    <li :class="{active:$page.component === 'projects/Backlog' }">
                        <Link :href="routes.backlog"  >
                            <i class="fa-solid fa-file-invoice"></i>
                            Backlog
                        </Link>
                    </li>
                    <li :class="{active:$page.component === 'projects/Sprints' }">
                        <Link :href="routes.sprint" >
                            <i class="fa-solid fa-table"></i>
                            Sprints
                        </Link>
                    </li>
                    <li :class="{active:$page.component === 'projects/Versions' }">
                        <i class="fa-solid fa-code-compare"></i>
                        <Link :href="routes.versions" >Versions</Link>
                    </li>
                    <li :class="{active:$page.component === 'projects/Component' }">
                        <i class="fa-solid fa-code-compare"></i>
                        <Link href="#" >
                            Components
                        </Link>
                    </li>
                </ul>
                <v-divider :thickness="3"  color="success" ></v-divider>
                <h3 class="text-xl font-bold mb-6 mt-6">More Actions</h3>

                <ProjectSettingsMenu/>

            </section>
        </aside>


    </div>
    <div  class="fixed z-50 bottom-4  " :class="state.show ?'ml-36':'ml-10 '">
        <v-btn
            icon
            variant="tonal"
            size="small"
            @click="state.show = !state.show"
        >
            <i v-if="!state.show" class="fa-solid fa-arrow-right"></i>
            <i v-else class="fa-solid fa-arrow-left"></i>
        </v-btn>
    </div>

</template>


<style >

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
    transition: all 0.2s ease-in-out;


}

.aside{
    height: 92vh;
    overflow: hidden;
}

</style>
