<script lang="ts" setup>

import {useIssueStore} from "@/stores/issue";
import SprintCardMenu from "@/Components/Backlog/SprintCardMenu.vue";
import IssueMenu from "@/Components/issue/issueMenu.vue";
import {useProjectStore} from "@/stores/projectStore";
import UserAvatarMenu from "@/Components/UserAvatarMenu.vue";

const props = defineProps({
    issue:Object
});



const issueStore = useIssueStore();
const projectStore = useProjectStore()


let assigneeUser =projectStore.users.filter((user)=>{
    //@ts-ignore
    return user.id == issueStore.issue.assigned_id
})

const issueClick  = ()=>{
    issueStore.showIssueDetails=true;
    //@ts-ignore
    issueStore.issue=props.issue
    issueStore.fetchComments()
    issueStore.fetchAttaches();
}
</script>

<template>
    <v-card class="flex gap-1 cursor-pointer  w-full"
    @click="issueClick"
    >

        <div
        class="flex gap-2 justify-space-between px-4 py-2 bg-white align-center rounded w-full "


        >
            <div class="flex gap-2">

                <div>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
                <p>

                    {{props.issue.title.substring(0,30)}} ...
                </p>

            </div>
            <div class="flex gap-2 align-center">
                <UserAvatarMenu v-if="assigneeUser.length > 0" :user="assigneeUser[0]"/>
                <IssueMenu :issue="props.issue" />
            </div>
        </div>

    </v-card>
</template>



<style lang="scss" scoped>

</style>
