

<script lang="ts" setup>

import {reactive, ref} from 'vue'
import draggable from "vuedraggable";
import {router} from "@inertiajs/vue3";
import {toast} from "vue3-toastify";

const props = defineProps({
    project: Object,

})

const notify = (message:string) => {
    toast(message.toString(), {
        autoClose: 1500,
    }); // ToastOptions
}





const state = reactive({
    tasks: [
        {
            id: 1,
            description: "Complete the coding challenge",
            completed: false
        },
        {
            id :2,
            description: "never forget your bed",
            completed: true,
        }
    ],
    dialog : false

})


console.log(props.project)

const deleteSprint = ()=>{
    console.log("delete sprint")
    console.log(props.project?.project_id)
    console.log(props.project?.id)
    router.visit(`/sprint/${props.project?.project_id}/delete/${props.project?.id}`)
    state.dialog= false;
    notify("Sprint deleted successfully 👌 ! ");



}

const editSprint = ()=>{
    console.log("edit sprint")
}

</script>


<template>

    <!--   💕 sprint Card start -->
    <div v-if="$page.props.flash?.success">
        {{ $page.props.flash.success }}
    </div>
    <section class="default-sprint mb-6 min-h-[180px] rounded  py-1 bg-gray-200">
        <div class="px-3 my-2">
            <draggable
                v-model="state.tasks"
                group="tasks"
                @start="state.drag=true"
                @end="state.drag=false"
                @change="console.log('change')"
                item-key="id"
            >
                <template class="grid  border-dotted border-gray-700 cursor-pointer border-3  align-content-lg-space-between" #item="{element,index}" >

                    <div :key="element.id" class="text-center  w-full  rounded my-3 ">
                        <v-card :text="element.description"   variant="outlined"></v-card>
                    </div>
                </template>
                <template #header>
                    <div class="flex align-center   justify-space-between">
                        <div class="flex gap-3 ">
                            <i class="fa-duotone fa-angle-down"></i>
                            <p>
                                {{ props.project.project_key }}
                                <span>
                                            sprint 1
                                        </span>
                            </p>
                            <div class="sprint-action flex">
                                <i class="fa-regular fa-pen"></i>
                                <p>
                                    Add Dates ({{ state.issuesLength  }} issuses)
                                </p>
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <button class="bg-gray-100 mr-2 hover:bg-gray-50 px-2 py-1 rounded ">
                                Start Sprint
                            </button>
                            <div>
                                <v-menu>
                                    <template v-slot:activator="{ props }">
                                        <button
                                            v-bind="props"
                                            class="bg-gray-100 px-2 py-1 hover:bg-gray-50 rounded ">
                                            <i class="fa-regular fa-ellipsis"></i>
                                        </button>
                                    </template>
                                    <v-list

                                    >

                                        <v-list-item
                                        @click="editSprint"
                                        >
                                            <v-list-item-subtitle>
                                            Edit </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item
                                            class=""

                                        >
                                           <v-dialog
                                           v-model="state.dialog"
                                           width="auto"
                                           >
                                                <template v-slot:activator="{ props }">
                                                    <v-list-item-subtitle
                                                    v-bind="props"
                                                    class="cursor-pointer text-red  "
                                                    >
                                                        Delete
                                                    </v-list-item-subtitle>
                                                </template>
                                               <v-card>
                                                   <v-card-title>
                                                       Delete sprint
                                                   </v-card-title>
                                                   <v-card-subtitle>
                                                       Are you sure you want to delete sprint AG Sprint 1?
                                                   </v-card-subtitle>
                                                   <v-card-actions>
                                                       <v-btn
                                                       variant="tonal"
                                                       color=""
                                                       class="bg-red"
                                                       @click="deleteSprint"
                                                       >
                                                           Delete
                                                       </v-btn>
                                                       <v-btn
                                                       @click="state.dialog=false"
                                                       >
                                                           Cancel
                                                       </v-btn>

                                                   </v-card-actions>
                                               </v-card>
                                           </v-dialog>
                                        </v-list-item>
                                    </v-list>
                                </v-menu>
                            </div>
                        </div>

                    </div>
                </template>
                <template #footer class="my-auto">
                    <section class="sprint-footer flex bg-gray-100 rounded px-3 py-2 mt-auto gap-2 ">
                        <i class="fa-duotone fa-plus"></i>
                        <p>
                            Create issues
                        </p>
                    </section>
                </template>
            </draggable>
        </div>
    </section>
    <!--  😍 sprint Card end -->

</template>


<style scoped>


</style>
