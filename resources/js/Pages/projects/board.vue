<script lang="ts" setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";
import { Head } from '@inertiajs/vue3';
import  {ref } from "vue";
import draggable from "vuedraggable";
import {reactive} from "vue";

const props = defineProps({
    project: Object,
})


function log(evt:any){
    console.log(evt)
    console.log(tasks);
}

const add = ()=>{
    tasks.push({
        id: tasks.length+ 1,
        description: input.value    ,
        completed: true
    })
}

interface Task {
    id: number;
    description: string;
    completed: boolean;
}




let tasks = reactive<Task[]>([
    {
        id: 1,
        description: "Complete the coding challenge",
        completed: false
    },
    {
        id: 2,
        description: "Attend the team meeting",
        completed: true
    },
    {
        id: 3,
        description: "Reply to client emails",
        completed: false
    },
    {
        id: 4,
        description: "Submit the monthly report",
        completed: false
    },
    {
        id: 5,
        description: "Take a break and go for a walk",
        completed: true
    }
])
let tasks2 = reactive<Task[]>([
    {
        id: 1,
        description: "Complete the coding challenge",
        completed: false
    },
    {
        id: 2,
        description: "Attend the team meeting",
        completed: true
    },
    {
        id: 3,
        description: "Reply to client emails",
        completed: false
    },
    {
        id: 4,
        description: "Submit the monthly report",
        completed: false
    },
    {
        id: 5,
        description: "Take a break and go for a walk",
        completed: true
    }
])
let tasks3 = reactive<Task[]>([
    {
        id: 1,
        description: "Complete the coding challenge",
        completed: false
    },

])



const input  = ref('')


const state = reactive({
        drag: false,
        tasks: tasks,
        tasks2: tasks2,
        tasks3: tasks3,

})

</script  >

<script lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {

    layout: AuthenticatedLayout,

}

</script>

<template>
    <div class="">
        <Head title="Project" />
        <div class="">
            <section class="text-black w-full flex mx-auto">
                <TheProjectAside :project="props.project" />
                <main class="flex-grow-1 board text-center overflow-y-scroll">
                    <section class="task-section  gap-6 m-6">
                        <div class="bg-gray-200   pt-3    min-h-[70vh] rounded border">
                            <h3 class="text-xl font-weight-medium text-gray-700 text-left pl-6">To do </h3>
                            <div class="px-3 mt-6 ">
                                <draggable
                                    v-model="state.tasks"
                                    group="tasks"
                                    @start="state.drag=true"
                                    @end="state.drag=false"
                                    @change="log"
                                    item-key="id"
                                >
                                    <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element,index}" >

                                        <div :key="element.id" class="text-center w-full border rounded my-3 ">
                                            <v-card :text="element.description"   variant="outlined"></v-card>
                                        </div>
                                    </template>
                                    <template #header>
                                        <div class="input flex mb-3 align-center   border-gray-300 px-3 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-white">
                                            <input v-model="input" type="text" class="w-full focus:ring-0 rounded" placeholder="Add something .. " />
                                            <button @click="add" type="submit" class="rounded hover:bg-blue-400 p-1 cursor-pointer">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </template>
                                </draggable>
                            </div>

                        </div>
                        <div class="bg-gray-200  pt-3 min-h-[70vh] rounded border">
                            <h3 class="text-xl font-weight-medium text-gray-700 text-left pl-6">In progress </h3>
                            <div class=" px-3 mt-6 ">
                                <draggable
                                    v-model="state.tasks2"
                                    group="tasks"
                                    @start="state.drag=true"
                                    @end="state.drag=false"
                                    @change="log"
                                    item-key="id"
                                >
                                    <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element,index}" >
                                        <div :key="element.id" class="text-center w-full border rounded my-3">
                                            <v-card :text="element.description"   variant="outlined"></v-card>
                                        </div>
                                    </template>
                                </draggable>
                            </div>

                        </div>
                        <div class="bg-gray-200 pt-3 min-h-[70vh] rounded border">
                            <h3 class="text-xl font-weight-medium text-gray-700 text-left pl-6">Done</h3>
                            <div class=" px-3 mt-6 ">
                                <draggable
                                    v-model="state.tasks3"
                                    group="tasks"
                                    @start="state.drag=true"
                                    @end="state.drag=false"
                                    @change="log"
                                    item-key="id"
                                >
                                    <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element,index}" >
                                        <div :key="element.id" class="text-center w-full border rounded my-3">
                                            <v-card :text="element.description"   variant="outlined"></v-card>
                                        </div>
                                    </template>
                                </draggable>
                            </div>
                        </div>
                        <div>

                        </div>

                    </section>

                </main>
            </section>
        </div>
    </div>
</template>


<style  scoped>

.task-section{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 300fr));
    grid-gap: 1rem;
}

.board{
    height: 92vh;
}

</style>
