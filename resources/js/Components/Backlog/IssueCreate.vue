
<script lang="ts" setup>
import {useIssueStore} from "@/stores/issue";


let backlogStore = useIssueStore();

const addIssue = (e:HTMLFormElement)=>{
    console.log("add issue")
    console.log(e.target[0].valueOf());
    backlogStore.backlog.push({
        //@ts-ignore
        id: backlogStore.backlog.length + 1,
        description: e.target[0].valueOf(),
        completed: true
    })


}


</script>


<template>
    <section class="sprint-footer flex bg-gray-100 rounded px-3 py-2 mt-auto gap-2 ">
        <i class="fa-duotone fa-plus"></i>
        <form @submit.prevent="addIssue" class="flex-grow-1 ">
            <input class=" active:ring-0 w-full border-none active:border-none focus:border-none focus:ring-0" placeholder="Create issues">
        </form>
    </section>
</template>
<style lang="scss" scoped>

</style>
