<script lang="ts" setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";
import HeaderBoard from "../../Components/board/HeaderBoard.vue";
import Tasks from "../../Components/board/Tasks.vue";
import { Head } from '@inertiajs/vue3';
import  {ref } from "vue";
import draggable from "vuedraggable";
import {reactive} from "vue";
import {useIssueStore} from "@/stores/issue";
import {useProjectStore} from "@/stores/projectStore";
import sprints from "@/Pages/projects/Sprints.vue";
import axios from "axios";



const issueStore = useIssueStore();



issueStore.showIssueDetails = false;


const props = defineProps({
    users : Object || null,
    project: Object,
    sprints : Array
})

const projectStore = useProjectStore();
//@ts-ignore
projectStore.users = props.users;
//@ts-ignore
projectStore.project = props.project



const changeTodo = (e:any)=>{
    console.log(e.target.value)
    axios.get(`/sprints/${e.target.value}/issues`,).then((data)=>{
        issueStore.issues = data.data
        console.log(issueStore.issues)

    }).catch((err)=>{
        console.log(err)
    })
}



interface Task {
    id: number;
    description: string;
    completed: boolean;
}

const input  = ref('')

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
            <section class="text-black mt-16 w-full flex mx-auto">
                <TheProjectAside :project="props.project" />
                <main class="w-full   p-6 ">
                    <HeaderBoard :search="props.project?.name" :users="props.users" :project_id="props.project?.id" />
                    <select
                        @change="changeTodo"
                        id="sprint" class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block min-w-[300px] p-2.5 ">
                        <option selected disabled>Choose a Sprint </option>
                        <option
                            v-for="sprint in props.sprints"  :key="sprint.id" :value ="sprint.id">
                            {{
                                sprint.name
                            }}
                        </option>
                    </select>
                    <Tasks />
                </main>

            </section>
        </div>
    </div>
</template>


<style  scoped>



</style>
