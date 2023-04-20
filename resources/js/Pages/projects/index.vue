
<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head,router } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/format-date/format-date';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import CreateVersionDialog from "@/Components/versions/CreateVersionDialog.vue";
import {reactive} from "vue";

defineProps({
    projects:Object
})

const state = reactive({
    inputSearch: "",
})

const goTothisProject = (id) => {

    console.log(id)
    router.visit(`/projects/${id}/board`)
}

const createProject = (e) => {
    console.log('create project')
    console.log(e.target)
    document.querySelector("#btn_close_project").click()
    router.post('/projects',e.target);

    setTimeout(()=>{
        Swal.fire({
            title: 'success',
            text: 'Do you want to continue',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    },300);

}

</script>

<template>
    <div>
        <Head title="Projects" />
        <AuthenticatedLayout>
            <section class="container p-6 m-auto">
                <h1 class="text-4xl  font-bold mb-6">Projects </h1>
                <h1 class="text-3xl">
                    Projects list
                </h1>
                <div class="w-full flex align-center justify-between">
                    <div class="border max-w-[250px] mt-3 rounded">
                        <div class="flex gap-2 align-center px-2 ">
                            <input v-model="state.inputSearch" @input="" type="text" class="w-full focus:ring-0 rounded" placeholder="search something .. " />
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <!-- todo : 😍 //create new project-->
                        <v-col cols="auto">
                            <v-dialog
                                transition="dialog-bottom-transition"
                                width="500"
                            >
                                <template v-slot:activator="{ props }">
                                    <p v-bind="props" class="text-blue-500 hover:text-blue-600 cursor-pointer">
                                        Create new project
                                    </p>

                                </template>
                                <template v-slot:default="{ isActive }">
                                    <v-card>
                                        <v-toolbar
                                            color="primary"
                                            title="Create new project"
                                        ></v-toolbar>
                                        <v-card-text>
                                            <form @submit.prevent="createProject">
                                                <div class="mb-6">
                                                    <label for="name" class=" mb-2 text-sm font-medium text-gray-900 "> Name </label>
                                                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="test example ..." required>
                                                </div>
                                                <div class="mb-6">
                                                    <label for="description" class=" mb-2 text-sm font-medium text-gray-900 ">description </label>
                                                    <input type="text" name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Entre your description ..." required>
                                                </div>


                                                <div class="mb-6">
                                                    <label for="type" class=" mb-2 text-sm font-medium text-gray-900 ">Project type </label>
                                                    <select id="type" name="project_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                                                        <option selected value="Scrum">Scrum</option>
                                                        <option value="Kanban">Kanban</option>

                                                    </select>
                                                </div>
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Project </button>
                                            </form>
                                        </v-card-text>
                                        <v-card-actions class="justify-end">
                                            <v-btn
                                                variant="text"
                                                id="btn_close_project"
                                                @click="isActive.value = false"
                                            >Close</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </template>
                            </v-dialog>
                        </v-col>
                </div>


                <div class="project mt-6 w-full">
                    <v-table class="w-full overflow-auto">
                        <thead class="mb-6 ">
                            <tr>
                                <th class="px-auto"> Name</th>
                                <th class="px-auto"> Description</th>
                                <th class="px-auto">Lead</th>
                                <th class="px-auto"> Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="mt-6 ">
                            <tr @click="goTothisProject(project.id)" class=" rounded border-b-2 border-gray-200 hover:bg-gray-200 cursor-pointer" v-for="project in projects" :key="project.id">
                                <td class="pl-2  ">
                                    <div class="flex  align-center gap-2">
                                        <img :src="project.project_cover" class="w-6  my-2 h-6 rounded-full">
                                        <p> {{ project.name }}</p>
                                    </div>
                                </td>
                                <td class="text-gray-500">{{ project.description.substring(1,60) }}...</td>
                                <td>
                                    <p>
                                        {{ project?.project_lead }}
                                    </p>
                                </td>
                                <td class="">
                                    <sl-format-date month="long" day="numeric" year="numeric" :date="project.created_at" />
                                </td>
                                <td class="flex justify-end">
                                    <button
                                        class="bg-gray-100  my-auto px-2 py-1 hover:bg-gray-50 rounded ">
                                        <i class="fa-regular fa-ellipsis"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </div>

            </section>


        </AuthenticatedLayout>
    </div>
</template>


<style lang="scss" scoped>

</style>
