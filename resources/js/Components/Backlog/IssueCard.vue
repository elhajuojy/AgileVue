<script lang="ts" setup>

import {useIssueStore} from "@/stores/issue";

const props = defineProps({
    issue:Object
});

const issueStore = useIssueStore();


console.log(props.issue)

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

                    {{props.issue.description}}
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
                <button
                    class="bg-gray-100 text-black px-2 py-1  rounded ">
                    <i class="fa-regular fa-ellipsis"></i>
                </button>
            </div>
        </div>

    </div>
</template>



<style lang="scss" scoped>

</style>
