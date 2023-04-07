<script lang="ts" setup>

import {useIssueStore} from "@/stores/issue";
import SprintCardMenu from "@/Components/Backlog/SprintCardMenu.vue";
import IssueMenu from "@/Components/issue/issueMenu.vue";

const props = defineProps({
    issue:Object
});

const issueStore = useIssueStore();



</script>

<template>
    <div class="flex gap-1 cursor-pointer  w-full"
    @click="issueStore.showIssueDetails=true;issueStore.issue=props.issue"
    >

        <div
        class="flex gap-2 justify-space-between px-4 py-2 bg-white align-center rounded w-full "


        >
            <div class="flex gap-2">

                <div>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
                <p>

                    {{props.issue.description.substring(1,30)}} ...
                </p>

            </div>
            <div class="flex gap-2 align-center">
                <div>
                    TODO
                </div>
                <div>
                    <v-avatar color="surface-variant"
                              size="25"
                    ></v-avatar>
                </div>
                <IssueMenu :issue="props.issue" />
            </div>
        </div>

    </div>
</template>



<style lang="scss" scoped>

</style>
