
<script lang="ts" setup>
import {Head, Link} from "@inertiajs/vue3";
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

const issueStore = useIssueStore();
const backlogStore = useBacklogStore();


const addIssue = (e:HTMLFormElement)=>{
    console.log("add issue")
    console.log(e.target[0].valueOf());
    state.tasks2.push({
        id: state.tasks2.length+ 1,
        description: e.target[0].valueOf(),
        completed: true
    })


}

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
                    <HeaderBoard :search="backlogStore.project?.name" :project_id="backlogStore.project?.id" />
                    <section class=" grid-cols-3 gap-2" :class="issueStore.showIssueDetails?'grid':''">
                        <div class="col-span-2 overflow-y-scroll pr-6">
                            <!--   💕 sprint Card start -->
                            <BacklogSprintCard v-for="sprint in props.sprints" key="sprint.id"  :sprint="sprint" />
                            <!--  😍 sprint Card end -->
                            <!-- add sprint or backlog issues  -->
                            <BacklogCreateCard  />
                        </div>
                        <IssueDetailsCard  v-if="issueStore.showIssueDetails"  />
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
