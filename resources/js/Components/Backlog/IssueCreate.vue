
<script lang="ts" setup>
import {useIssueStore} from "@/stores/issue";
import {router} from "@inertiajs/vue3";
import {reactive} from "vue";
import {useProjectStore} from "@/stores/projectStore";


const emits = defineEmits([
    'getIssues'
])


let backlogStore = useIssueStore();
const projectStore = useProjectStore()

const props = defineProps({
    id_sprint : Number
})

const state = reactive({
    title : ""
})

    //@ts-ignore
const addIssue = (e:HTMLFormElement)=>{
    //@ts-ignore
    router.visit(`/api/issues/${projectStore.project?.id}/create`,{
        // title : e.target[0].value
        method :"post",
        data :  {
            title : state.title,
            sprint_id : props.id_sprint,
            //@ts-ignore
            project_id : projectStore.project.id
        },
        preserveState: true,
        preserveScroll: true,
    });

    // fetch issue again on parent by emitting the fetchIssue in the parent component


    emits("getIssues")



}


</script>


<template>
    <section class="sprint-footer flex bg-gray-100 rounded px-3 py-2 mt-auto gap-2 ">
        <i class="fa-duotone fa-plus"></i>
        <form @submit.prevent="addIssue" class="flex-grow-1 ">
            <input v-model="state.title" class=" active:ring-0 w-full border-none active:border-none focus:border-none focus:ring-0" placeholder="Create issues">
        </form>
    </section>
</template>
<style lang="scss" scoped>

</style>
