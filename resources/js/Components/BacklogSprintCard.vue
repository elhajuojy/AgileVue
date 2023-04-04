

<script setup>

import {reactive, ref} from 'vue'
import draggable from "vuedraggable";


const props = defineProps({
    project: Object,

})

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

})

</script>


<template>

    <!--   💕 sprint Card start -->
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
                        <div>
                            <button class="bg-gray-100 mr-2 hover:bg-gray-50 px-2 py-1 rounded ">
                                Start Sprint
                            </button>
                            <button class="bg-gray-100 px-2 py-1 hover:bg-gray-50 rounded ">
                                <i class="fa-regular fa-ellipsis"></i>
                            </button>
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

.board{
    height: 92vh;
}
</style>
