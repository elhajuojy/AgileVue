<script lang="ts" setup>

import {Head, router} from '@inertiajs/vue3';
import {ref, watch} from "vue";
import draggable from "vuedraggable";
import {reactive} from "vue";
import {useIssueStore} from "@/stores/issue";
import Tasks from "@/Components/board/Tasks.vue";
import axios from "axios";
import {useProjectStore} from "@/stores/projectStore";



const props = defineProps({
    issues : Array
})

const projectStore = useProjectStore()


const addIssue = (e:HTMLFormElement)=>{
    //@ts-ignore
    console.log(e)
    router.visit(`/api/issues/${projectStore.project?.id}/create`,{
        // title : e.target[0].value
        method :"post",
        data :  {
            title : input.value,
            //@ts-ignore
            sprint_id : props.issues[0].sprint_id,
            //@ts-ignore
            project_id : projectStore.project.id
        },
        preserveScroll: true,
    });





}

interface Task {
    id: number;
    description: string;
    completed: boolean;
}


const input  = ref('')


const changeStatus = (event:any,myParam:string)=>{
    if (event.added) {

        //todo: I need to change the status new in the database using axois

        axios.patch(`/api/issues/${event.added.element.id}/status`,{
            status :myParam
        });

    }


}



const state = reactive<any>({
    drag: false,
    tasks: props.issues?.filter((issue)=>{
        return issue?.status == "todo"
    }),
    tasks2:  props.issues?.filter((issue)=>{
        return issue?.status == "in_progress"
    }),
    tasks3:  props.issues?.filter((issue)=>{
        return issue?.status == "done"
    }),

})







</script  >
<template>
    <main class="flex-grow-1 board text-center ">
        <section class="task-section gap-6  ">
            <div class="bg-gray-200 pt-3 min-h-[70vh] rounded border">
                <h3 class="text-xl font-weight-medium text-gray-700 text-left pl-6">To do </h3>
                <div class="px-3 mt-6  z-1 ">
                    <draggable
                        v-model="state.tasks"
                        group="tasks"
                        @start="state.drag=true"
                        @end="state.drag=false"
                        @change="changeStatus($event,'todo')"

                        item-key="id"
                    >
                        <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element , index}" >

                            <div :key="element.id" class="text-center w-full border rounded my-3 ">
                                <v-card :text="element.title"   variant="outlined"></v-card>
                            </div>
                        </template>
                        <template #header>
                            <div class="input flex mb-3 align-center   border-gray-300 px-3 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-white">
                               <form
                                   @submit.prevent="addIssue"
                               class="flex align-center "
                               >
                                   <input v-model="input" type="text" class="w-full focus:ring-0 rounded" placeholder="Add something .. " />
                                   <v-btn
                                       variant="text"
                                       size="small"
                                       @click="addIssue" type="submit" class="ml-auto">
                                       <i class="fa-solid fa-plus"></i>
                                   </v-btn>
                               </form>
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
                        @change="changeStatus($event,'in_progress')"
                        item-key="id"
                    >
                        <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element,index}" >
                            <div :key="element.id" class="text-center w-full border rounded my-3">
                                <v-card :text="element.title"   variant="outlined"></v-card>
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
                        @change="changeStatus($event,'done')"
                        item-key="id"
                    >
                        <template class="grid  cursor-pointer align-content-lg-space-between" #item="{element,index}" >
                            <div :key="element.id" class="text-center w-full border rounded my-3">
                                <v-card :text="element.title"   variant="outlined"></v-card>
                            </div>
                        </template>
                    </draggable>
                </div>
            </div>
            <div>

            </div>

        </section>

    </main>
</template>


<style  scoped>
.task-section{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 300fr));
    grid-gap: 1rem;

}


</style>
