

<script setup>
import {useIssueStore} from "@/stores/issue";
import IconButton from "@/Components/IconButton.vue";
const issueStore = useIssueStore();


console.log(issueStore.issue)






</script>

<template>
    <section
        v-if="issueStore.showIssueDetails"
        class="h-full overflow-x-hidden overflow-y-scroll ">
        <div class=" flex mb-3 gap-2 justify-between mx-2 items-center">
            <div>
                <h2 class="text-body-2">
                    Action
                </h2>
            </div>
            <div class="flex gap-2">
                <IconButton

                >
                    <i class="fa-solid fa-lock"></i>
                </IconButton>
                <IconButton>
                    <i class="fa-solid fa-eye"></i>
                </IconButton>
                <IconButton>
                    <i class="fa-duotone fa-thumbs-up"></i>
                </IconButton>
                <IconButton>
                    <i class="fa-light fa-ellipsis"></i>
                </IconButton>
                <IconButton
                    @click="issueStore.showIssueDetails=false"
                >
                    <i class="fa-solid fa-xmark"></i>
                </IconButton>
            </div>


        </div>
        <div class="">
            <h1 contentEditable="true" class="text-3xl mb-3 ">
               {{ issueStore.issue.description }}
            </h1>
            <div class="flex mb-3 gap-2">
                <IconButton>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-paperclip"></i>
                        <p>Attach</p>
                    </div>
                </IconButton>
                <IconButton>
                    <div class="flex gap-2">
                        <i class="fa-solid fa-link"></i>
                        <p>Link issue </p>
                    </div>
                </IconButton>
            </div>
            <div class="flex gap-2 pr-3 ">
                <sl-select
                    placeholder="Select an option..."
                    class="bg-blue-100"
                    size="small"

                >
                    <sl-option value="1">Option 1</sl-option>
                    <sl-option value="2">Option 2</sl-option>
                    <sl-option value="3">Option 3</sl-option>
                </sl-select>
                <sl-select
                    placeholder="Actions "
                    size="small"

                >
                    <sl-option value="1">Option 1</sl-option>
                    <sl-option value="2">Option 2</sl-option>
                    <sl-option value="3">Option 3</sl-option>
                </sl-select>

            </div>
            <div class="mt-3">
                <h4 class="text-base">
                    Description
                </h4>
                <textarea class="w-full h-40 outline-none border-2 border-gray-300 rounded p-2" placeholder="Add a more detailed description..."></textarea>
            </div>
            <div>
                <h4>
                    Assignee
                </h4>
                <sl-select>
                    <sl-option>
                        elmahdi elhjuojy
                    </sl-option>
                </sl-select>
            </div>
            <div>
                <p class="mb-3">
                    Comments
                </p>
                <div class="mt-3 flex gap-2">

                    <v-avatar color="surface-variant"
                              size="25"
                    ></v-avatar>
                    <div contenteditable="true" class="bg-white w-75">
                        Add Comment ...
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>


<style lang="scss" scoped>

</style>
