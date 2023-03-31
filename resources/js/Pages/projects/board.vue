<script lang="ts" setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";
import HeaderBoard from "../../Components/board/HeaderBoard.vue";
import Tasks from "../../Components/board/Tasks.vue";
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

<script lang="ts" >

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
                <main class="w-full overflow-y-scroll p-6 ">
                    <HeaderBoard :search="props.project.name" />
                        <Tasks/>
                </main>

            </section>
        </div>
    </div>
</template>


<style  scoped>


.board{
    height: 92vh;
}

</style>
