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
                    <Tasks/>
                </main>

            </section>
        </div>
    </div>
</template>


<style  scoped>



</style>
