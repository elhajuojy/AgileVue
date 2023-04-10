<script setup>

import {reactive} from "vue";
import draggable from "vuedraggable";

import IssueCard from "@/Components/Backlog/IssueCard.vue";
import {Link} from "@inertiajs/vue3";
import {useBacklogStore} from "@/stores/BacklogStore";
import axios from "axios";
import IssueCreate from "@/Components/Backlog/IssueCreate.vue";

let backlogStore = useBacklogStore();



// get all issues with no sprint
const fetchIssuesBacklog = () => {
    axios.get(`/api/issues/${backlogStore.project.id}/backlog`).then((response) => {
        state.issuesLength = response.data.length
        state.tasks = response.data
    })
}

fetchIssuesBacklog()   // call the function

const state = reactive({

    tasks:[

    ],
    drag: false,
    issuesLength: 0,
    showActions : true
})



</script>

<template>
    <section class="default-sprint mt-6 min-h-[180px]  py-1 ">
        <div class="px-3 my-2">
            <draggable
                v-model="state.tasks"
                group="tasks"
                @start="state.drag=true"
                @end="state.drag=false"
                @change=""
                item-key="id"
            >
                <template class="grid  border-dotted border-gray-700 cursor-pointer border-3  align-content-lg-space-between" #item="{element,index}" >

                    <div :key="element.id" class="text-center  w-full  rounded my-3 ">
                        <IssueCard :issue="element"/>
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
                        <Link href="/sprint"  method="POST" as="button"
                              :data="{ project_id: backlogStore.project?.id  }"
                              class="bg-gray-100 px-2 py-1 rounded ">
                            Create Sprint
                        </Link>

                    </div>
                </template>
                <template #footer class="my-auto mt-6">
                    <IssueCreate/>
                </template>
            </draggable>
        </div>
    </section>
</template>



<style lang="scss" scoped>

</style>
