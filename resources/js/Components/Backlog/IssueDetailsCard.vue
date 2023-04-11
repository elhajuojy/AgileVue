

<script setup>
import {useIssueStore} from "@/stores/issue";
import IconButton from "@/Components/IconButton.vue";
import {useGlobalStateStore} from "@/stores/globalState";
import axios from "axios";
import { router } from '@inertiajs/vue3'
const issueStore = useIssueStore();
const userStore = useGlobalStateStore();
import {ref} from "vue";

let commentarea = ref("")
let comments = ref([])
const addComment = (e) => {

    const formData = new FormData(e.target);




    formData.append('user_id', userStore.user.id);
    formData.append('issue_id', issueStore.issue.id);
    formData.append("body",formData.get("comment"));

    const url = "/api/issues/add-comment";

    router.visit(url,
        {
        method: 'post',
        data: formData,
        preserveState: true,
        preserveScroll: true,
        only: ['comments'],
        onSuccess: () => {
            console.log('success')
        },
        onError: () => {
            console.log('error')
        }
    });


    commentarea.value = ""
    fetchComment()







}

const fetchComment = ()=>{

    const url  = `/api/issues/${issueStore.issue.id}/comments`

    axios.get(url).then((data)=>{
        console.log(data)
        comments.value = data.data
    }).catch((error)=>{
        console.log(error)
    })
}

fetchComment();


</script>


<template>
    <section
        v-if="issueStore.showIssueDetails"
        class="h-full  ">
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
                <v-text-field label="Add a more detailed description..."></v-text-field>
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
                <p class="my-3">
                    Comments
                </p>
                <div class="mt-3 flex gap-2">

                    <v-avatar

                        size="25"
                    >

                        <v-img :src="userStore.user.profile_image">

                        </v-img>
                    </v-avatar>
                        <form class="w-full" @submit.prevent="addComment" method="post">

                        <v-textarea label="Add Comment ... " name="comment"
                                    v-model="commentarea"

                        >
                        </v-textarea>
                            <v-btn
                                color="primary"
                                size="small"
                                type="submit"


                            variant="tonal"
                            >
                                save
                            </v-btn>
                        </form>

                </div>
                <table class="w-full mt-6">
                    <v-card key="comment.id" v-for="comment in comments"
                    variant="text"
                            class="flex  gap-3"
                    >
                       <div class="flex gap-3">
                           <v-avatar>
                               <v-img
                                   src="https://api.dicebear.com/6.x/lorelei/svg?seed=nouhila"
                               >

                               </v-img>
                           </v-avatar>

                           <div class="my-2">
                               <p>
                                   {{ comment.body }}
                               </p>
                               <v-btn variant="flat" size="x-small">
                                   Edit
                               </v-btn>
                               <v-btn variant="flat" size="x-small">
                                   Delete
                               </v-btn>
                           </div>
                       </div>
                    </v-card>

                </table>
            </div>
        </div>
    </section>
</template>


<style lang="scss" scoped>

</style>
