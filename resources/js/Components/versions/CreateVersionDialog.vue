<script setup lang="ts">
import { ref } from 'vue'
import {router} from "@inertiajs/vue3";
import {useProjectStore} from "@/stores/projectStore";


const dialog = ref(false)
const projectStore = useProjectStore()


const createVersion = (e:any) => {
    router.visit(`/projects/${projectStore.project?.id}/versions`, {
        method: 'post',
        data: new FormData(e.target),
        preserveScroll: true,
        preserveState: true,
    })
    // dialog.value = false
}

</script>

<template>
    <div class="text-center">

        <button class="bg-blue-700 hover:bg-blue-900 text-sm text-white font-bold py-2 px-4 rounded mt-3">
            créer un version
            <v-dialog
                v-model="dialog"
                activator="parent"
                width="auto"
            >
                <v-card
                class="min-w-[400px]"
                >
                    <v-card-title>
                        <span class="headline">Create a new version</span>
                    </v-card-title>
                    <form
                    @submit.prevent="createVersion"

                    >
                        <section>
                            <div class="flex flex-col gap-2 px-6 py-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input name="name" type="text" placeholder="Project AgileVue for company x" class="border rounded px-2 py-1" />
                            </div>

                            <div class="flex justify-between align-center gap-2 px-6 py-2">
                                <label for="start_date" class="block  text-sm font-medium text-gray-900 ">Start date</label>
                                <input type="date" name="start_date" class="border rounded px-2 py-1" />
                            </div>
                            <div class="flex justify-between align-center gap-2 px-6 py-2">
                                <label for="end_date" class="block text-sm font-medium text-gray-900 ">End date</label>
                                <input type="date" name="end_date" class="border rounded px-2 py-1" />
                            </div>
                            <div class="flex  flex-col justify-between gap-2 px-6 py-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Type </label>
                                <select name="type" class="border rounded px-2 py-1">
                                    <option value="sprint">sprint</option>
                                    <option value="release">release</option>
                                </select>
                            </div>
                            <div class="flex flex-col justify-between gap-2 px-6 py-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Status </label>
                                <select name="status" class="border rounded px-2 py-1">
                                    <option value="closed">closed</option>
                                    <option value="open">open</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-2 px-6 py-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                <textarea name="description" class="border rounded px-2 py-1" rows="3"></textarea>
                            </div>

                        </section>
                        <div class="flex justify-end gap-3 px-6 pb-2">
                            <button @click="dialog=false" class="hover:bg-gray-200 font-bold py-2 px-4 rounded mt-3">
                                cancel
                            </button>
                            <button class="bg-blue-700 hover:bg-blue-900 text-sm text-white font-bold py-2 px-4 rounded mt-3">
                                create
                            </button>
                        </div>
                    </form>
                </v-card>
            </v-dialog>
        </button>
    </div>
</template>
