
<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head,router } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/relative-time/relative-time.js';
import Swal from 'sweetalert2/dist/sweetalert2.js';

defineProps({
    projects:Object
})


const goTothisProject = (id) => {

    console.log(id)
    router.visit(`/projects/${id}/board`)
}

const createProject = (e) => {
    console.log('create project')
    console.log(e.target)
    document.querySelector(".v-btn__content").click()
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

<!--                <a href="" class="text-blue-500 hover:text-blue-600 mt-12 " >Create new project</a>-->
                <v-row >
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
                                            @click="isActive.value = false"
                                        >Close</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </template>
                        </v-dialog>
                    </v-col>
                </v-row>
                <div class="project mt-6 w-full">
                    <table class="w-full overflow-auto">
                        <thead class="mb-6 text-center">
                            <tr>
                                <th class="px-6">Project Name</th>
                                <th class="px-6">Project Description</th>
                                <th class="px-6">Project cover</th>
                                <th class="px-6">Project Created</th>
                            </tr>
                        </thead>
                        <tbody class="mt-6">
                            <tr @click="goTothisProject(project.id)" class=" border-b-2 border-gray-200 hover:bg-gray-200 cursor-pointer" v-for="project in projects" :key="project.id">
                                <td >{{ project.name }}</td>
                                <td class="text-gray-500">{{ project.description.substring(1,60) }}...</td>
                                <td><img :src="project.project_cover" class="w-10 m-auto my-2 h-10 rounded-full"></td>
                                <td class="text-center">
                                    <sl-relative-time :datetime="project.created_at" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>


        </AuthenticatedLayout>
    </div>
</template>


<style lang="scss" scoped>

</style>
