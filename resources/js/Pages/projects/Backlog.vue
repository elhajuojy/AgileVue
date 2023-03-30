
<script lang="ts" setup>
import {Head} from "@inertiajs/vue3";

import TheProjectAside from "@/Components/TheProjectAside.vue";
import {defineProps, reactive} from "vue";
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
    tasks2:[
        {
            id:4,
            description:"never change code ..",
            completed: true,
        }
    ],
    drag: false,
    issuesLength: 0,
})

</script>

<script lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import HeaderBoard from "@/Components/board/HeaderBoard.vue";

export default {

    layout: AuthenticatedLayout,

}
</script>

<template>
    <div>
       <Head title="Backlog" />
        <section class="text-black w-full flex mx-auto">
            <TheProjectAside :project="props.project" />
            <main class="w-full overflow-y-scroll p-6 ">
                <HeaderBoard :search="props.project.name" />
                <!--   💕 sprint Card start -->
                <section class="default-sprint min-h-[180px]  py-1 bg-gray-200">
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
                                    <button class="bg-gray-100 px-2 py-1 rounded ">
                                        Start Sprint
                                    </button>

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
                <!-- add sprint or backlog issues  -->
                <section class="default-sprint mt-6 min-h-[180px]  py-1 ">
                    <div class="px-3 my-2">
                        <draggable
                            v-model="state.tasks2"
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
                                <div class="flex align-center   mb-6 justify-space-between">
                                    <div class="flex gap-3 ">
                                        <i class="fa-duotone fa-angle-down"></i>
                                        <p>
                                           Backlog ( {{state.issuesLength }} issues  )
                                        </p>
                                    </div>
                                    <button class="bg-gray-100 px-2 py-1 rounded ">
                                        Create Sprint
                                    </button>

                                </div>
                            </template>
                            <template #footer class="my-auto mt-6">
                                <section class="sprint-footer  flex bg-gray-100 rounded px-3 py-2 mt-auto gap-2 ">
                                    <i class="fa-duotone fa-plus"></i>
                                    <p>
                                        Create issues
                                    </p>
                                </section>
                            </template>
                        </draggable>
                    </div>
                </section>

            </main>
        </section>
    </div>
</template>

<style scoped>
.board{
    height: 92vh;
}

</style>
