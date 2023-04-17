

<script setup>
import {useIssueStore} from "@/stores/issue";
import IconButton from "@/Components/IconButton.vue";
import {useGlobalStateStore} from "@/stores/globalState";
import axios from "axios";
import { router } from '@inertiajs/vue3'
const issueStore = useIssueStore();
const userStore = useGlobalStateStore();
import {onUpdated, ref} from "vue";
import {useProjectStore} from "@/stores/projectStore";

let commentarea = ref("")
const projectStore  = useProjectStore();



const assigneIssue  = (e) =>{
    //todo : I need just id of the user and the id of the issue to assigne the issue to the user

    //@ts-ignore
    let userAssignedToId= e.target.value ;
    const idIssue = issueStore.issue.id ;

    router.visit("/api/issues/assign-issue",{
        method :"patch",
        data:{
            issue_id:idIssue,
            assigned_id:userAssignedToId
        },
        preserveState: true,
        preserveScroll: true,

    })


}


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
    issueStore.fetchComments();







}

issueStore.fetchComments();


function deleteComment(id) {
    const url = "/api/issues/remove-comment/"+id;

    router.visit(url,
        {
            method: 'delete',
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

    issueStore.fetchComments();
}

// i want to call the change when the issueStore.issue change but it doesn't work

</script>


<template>
    <section
        v-if="issueStore.showIssueDetails"
        class="max-h-fit ">
        <div class=" flex mb-3 gap-2 justify-between mx-2 items-center">
            <div>
                <h2 class="text-body-2">
                    Action
                </h2>
            </div>
            <div class="flex gap-2">
                <IconButton>
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
               {{ issueStore.issue.title }}
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
            <div class="flex gap-3 mt-2">
                <div>
                    <p>
                        Start Date
                    </p>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input  type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Select date">
                    </div>
                </div>
                <div>
                    <p>
                        End Date
                    </p>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input  type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Select date">
                    </div>
                </div>
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
                <select
                    @change="assigneIssue"
                    id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected disabled>
                        Select user
                    </option>
                    <option v-for="user in projectStore.users" :key="user.id" :value="user.id"  :selected="user.id === issueStore.issue.assigned_id">
                        {{ user.full_name }}
                    </option>


                </select>
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
                    <v-card key="comment.id" v-for="comment in issueStore.comments"
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
                               <v-btn variant="flat" size="x-small"
                               @click="deleteComment(comment.id)"
                               >
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
