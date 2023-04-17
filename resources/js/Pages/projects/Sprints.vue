
<script setup lang="ts">

import {Head} from "@inertiajs/vue3";
import Tasks from "@/Components/board/Tasks.vue";
import HeaderBoard from "@/Components/board/HeaderBoard.vue";
import TheProjectAside from "@/Components/TheProjectAside.vue";
import {useProjectStore} from "@/stores/projectStore";

const props = defineProps({
    sprints : Array,

})

let projectStore = useProjectStore()

const goToSprint= ()=>{
    console.log("go to this sprint")
}

</script>


<script lang="ts" >

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";


export default {

    layout: AuthenticatedLayout,

}

</script>

<template>
    <Head title="Sprints" />
    <div class="">
        <section class="text-black mt-16 w-full flex mx-auto">
            <TheProjectAside :project="projectStore.project" />
            <main class="w-full   p-6 ">
                    <v-table height="300px">
                        <thead>
                        <tr>
                            <th class="text-left">
                                Name
                            </th>
                            <th class="text-left">
                                description
                            </th>
                            <th>
                                start / end Date
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="item in sprints"
                            :key="item.name"
                            class=" rounded border-b-2 border-gray-200 hover:bg-gray-200 cursor-pointer"
                            @click="goToSprint"
                        >
                            <td>{{ item.name }}</td>
                            <td>{{ item.description }}</td>
                            <td class="text-sm"> {{ item.start_date }} / {{ item.end_date }}</td>
                        </tr>


                        </tbody>
                    </v-table>

            </main>

        </section>
    </div>
</template>

<style scoped>

</style>
