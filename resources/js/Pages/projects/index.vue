
<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head,router } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/relative-time/relative-time.js';

defineProps({
    projects:Object
})


const goTothisProject = (id) => {

    console.log(id)
    router.visit(`/projects/${id}`)

}

</script>

<template>
    <div>
        <Head title="Projects" />
        <AuthenticatedLayout>
            <section class="container p-6 m-auto">
                <h1 class="text-5xl">Projects </h1>

                <a href="" class="text-blue-500 hover:text-blue-600 mt-12 py-6">Create new project</a>
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
