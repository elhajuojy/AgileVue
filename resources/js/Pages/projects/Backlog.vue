
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

// @ts-ignore
import { useIssueStore} from "@/stores/issue";
import IssueDetailsCard from "@/Components/Backlog/IssueDetailsCard.vue";

const issueStore = useIssueStore();




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

const state = reactive({

    tasks2:[
        {
            id:4,
            description:"never change code ..",
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
        <section class="text-black w-full flex mx-auto"
        >
            <TheProjectAside :project="props.project" />

                <main class="overflow-y-auto board col-span-2 w-full grid p-6 ">
                    <HeaderBoard :search="props.project.name" :project_id="props.project.id" />
                    <section class=" grid-cols-3 gap-2" :class="issueStore.showIssueDetails?'grid':''">
                        <div class="col-span-2">
                            <!--   💕 sprint Card start -->
                            <BacklogSprintCard v-for="sprint in props.sprints" key="sprint.id"  :sprint="sprint" />
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
                                                <Link href="/sprint"  method="POST" as="button"
                                                      :data="{ project_id: props.project.id  }"
                                                      class="bg-gray-100 px-2 py-1 rounded ">
                                                    Create Sprint
                                                </Link>

                                            </div>
                                        </template>
                                        <template #footer class="my-auto mt-6">
                                            <section class="sprint-footer flex bg-gray-100 rounded px-3 py-2 mt-auto gap-2 ">
                                                <i class="fa-duotone fa-plus"></i>
                                                <form @submit.prevent="addIssue" class="flex-grow-1">
                                                    <input class=" active:ring-0 w-full border-none active:border-none focus:border-none focus:ring-0" placeholder="Create issues">
                                                </form>
                                            </section>
                                        </template>
                                    </draggable>
                                </div>
                            </section>
                        </div>
                        <IssueDetailsCard  v-if="issueStore.showIssueDetails" />
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
