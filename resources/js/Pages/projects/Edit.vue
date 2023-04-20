<script setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";

import {Head, router} from '@inertiajs/vue3';
import {useProjectStore} from "@/stores/projectStore";
import EditProjectForm from "@/Components/Project/EditProjectForm.vue";

const projectStore = useProjectStore();

</script>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    layout : AuthenticatedLayout
}
</script>
<template>
    <Head title="Project " />
    <div>
        <div class="">
            <section class="text-black mt-16 w-full flex mx-auto">
                <TheProjectAside :project="projectStore.project" />
                <main class="flex-grow-1 container mt-6">
                    <VBreadcrumbs :items="[
                        {
                            text: 'Projects',
                            href: '/projects'
                        },
                        {
                            text: projectStore.project.name,
                            href: `/projects/${projectStore.project.id}/board`
                        },
                        {
                            text: 'Edit ',
                            href: `/projects/${projectStore.project.id}/board`
                        }
                    ]" />

                    <h1 class="text-3xl font-bold">
                       Details
                    </h1>
                    <EditProjectForm/>
                </main>
            </section>
        </div>

    </div>
</template>



<style lang="scss" scoped>

</style>
