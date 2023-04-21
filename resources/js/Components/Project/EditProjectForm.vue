<script setup>
import {useProjectStore} from "@/stores/projectStore";
import {reactive} from "vue";
import {router, useForm} from "@inertiajs/vue3";

const projectStore = useProjectStore();

const form = useForm({
    name: projectStore.project.name,
    project_key: projectStore.project.project_key,
    project_cover: null,
    description: projectStore.project.description,
    project_lead: projectStore.project.project_lead,

})


function submit() {
    console.log(form);
    form.patch(`/projects/${projectStore.project.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            router.push(route('projects.show', projectStore.project.id))
        }
    })

}


</script>
<template>
    <!-- Hire Us -->
    <!-- Hire Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-xl mx-auto">


            <div class="m-auto mb-6 grid place-content-center">
                <v-avatar :image="projectStore.project.project_cover" size="100"
                          class="m-auto mb-4"
                ></v-avatar>
                <label for="project_cover" class="">Choose file</label>
                <input  type="file" @input="form.project_cover = $event.target.files[0]"  name="project_cover" id="project_cover" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-2 file:px-4"
                >
            </div>
            <div class="mt-12">
                <!-- Form -->
                <form @submit.prevent="submit">

                    <div class="grid gap-4 lg:gap-6">
                            <div>
                                <label for="name" class="block text-sm text-gray-700 font-medium "> Name</label>
                                <input v-model="form.name" type="text" name="name" id="name" class="py-3 border px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                                <div v-if="form.errors.name" class="text-red-500 mt-1 text-sm">
                                    {{ form.errors.name }}
                                </div>
                            </div>

                        <div>
                            <label for="project_key" class="block text-sm text-gray-700 font-medium ">Key </label>
                            <input v-model="form.project_key" type="text" name="project_key" id="project_key" autocomplete="email" class="py-3 px-4  border block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                            <div v-if="form.errors.project_key" class="text-red-500 mt-1 text-sm">
                                {{ form.errors.project_key }}
                            </div>
                        </div>

                        <div>
                            <label for="project_lead" class="block text-sm text-gray-700 font-medium ">Project lead</label>
                            <input  v-model="form.project_lead" type="text" name="project_lead" id="project_lead" class="py-3 px-4 block w-full border-gray-200   rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 border ">
                            <div v-if="form.errors.project_lead" class="text-red-500 mt-1 text-sm">
                                {{ form.errors.project_lead }}
                            </div>
                        </div>



                        <div>
                            <label for="description" class="block text-sm text-gray-700 font-medium ">Description </label>
                            <textarea v-model="form.description" id="description" name="description" rows="4" class="py-3 px-4 border block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 "></textarea>
                            <div v-if="form.errors.description" class="text-red-500 mt-1 text-sm">
                                {{ form.errors.description }}
                            </div>
                        </div>
                    </div>



                    <div class="mt-6 ">
                        <button type="submit" :disabled="form.processing" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-2 px-3 ">
                            <span>Update </span>
                        </button>
                    </div>

                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }} %
                    </progress>

                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
    <!-- End Hire Us -->
</template>

<style scoped>

</style>
