
<script lang="ts" setup>
import {Head, Link, router} from "@inertiajs/vue3";
import TheProjectAside from "@/Components/TheProjectAside.vue";
import {defineProps, reactive, ref} from "vue";
import draggable from "vuedraggable";
import created from "vue";
import BacklogSprintCard from "../../Components/Backlog/BacklogSprintCard.vue";
import {onMounted} from "vue";
import IconButton from "../../Components/IconButton.vue";
import "@shoelace-style/shoelace/dist/components/select/select";
import "@shoelace-style/shoelace/dist/components/option/option";
import {useBacklogStore} from "@/stores/BacklogStore";
// @ts-ignore
import { useIssueStore} from "@/stores/issue";
import IssueDetailsCard from "@/Components/Backlog/IssueDetailsCard.vue";
import BacklogCreateCard from "@/Components/Backlog/BacklogCreateCard.vue";
import {useProjectStore} from "@/stores/projectStore";

const issueStore = useIssueStore();
const backlogStore = useBacklogStore();
const projectStore = useProjectStore()



const props = defineProps({
    project: Object,
    sprints: Object,

})

//@ts-ignore
backlogStore.project = props.project



const state = reactive({

    tasks2:[
        {
            id:4,
            description:"all issue with no sprint should be here ...",
            completed: true,
        }
    ],
    drag: false,
    issuesLength: 0,
    showActions : true
})


function updateCardTitle(){
    console.log("update card title")
    // i want to force this component to rerender
    console.log("update card title 2")

}

</script>

<script lang="ts">

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import HeaderBoard from "../../Components/board/HeaderBoard.vue";
import  {ref } from "vue";


export default {

    layout: AuthenticatedLayout,

}



</script>

<template>
    <div >
       <Head title="Backlog" />
        <section class="text-black mt-16 w-full flex mx-auto"
        >
            <TheProjectAside :project="props.project" />

                <main class="overflow-y-auto board col-span-2 w-full grid p-6 ">
                    <HeaderBoard :users="projectStore.users" :search="backlogStore.project?.name" :project_id="backlogStore.project?.id" />
                    <section class=" lg:grid-cols-3 gap-2 md:grid-cols-1 " :class="issueStore.showIssueDetails?'grid':''">
                        <div class="col-span-2 overflow-y-scroll mb-6 pr-6">
                            <!--   💕 sprint Card start -->
                            <BacklogSprintCard v-for="sprint in props.sprints" key="sprint.id"  :sprint="sprint" />
                            <!--  😍 sprint Card end -->
                            <!-- add sprint or backlog issues  -->
                            <BacklogCreateCard  />
                        </div>
                        <div class="w-full ">
                            <IssueDetailsCard @update-title="updateCardTitle"  v-if="issueStore.showIssueDetails"  />
                        </div>
                    </section>

                </main>
        </section>
    </div>
</template>

<style scoped>


textarea:focus, input:focus{
    outline: none;
}

</style>
