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



const issueStore = useIssueStore();

issueStore.showIssueDetails = false;


const props = defineProps({
    users : Object || null,
    project: Object,
})

const projectStore = useProjectStore();
//@ts-ignore
projectStore.users = props.users;
//@ts-ignore
projectStore.project = props.project

//@ts-ignore
projectStore.users = props.users





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
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Select a Role </label>
                    <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a Role </option>
                        <option value="US"> Adminstrator</option>
                        <option value="CA">Developer</option>
                        <option value="FR"> designer </option>
                    </select>
                    <Tasks/>
                </main>

            </section>
        </div>
    </div>
</template>


<style  scoped>



</style>
