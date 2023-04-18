
<script setup lang="ts">

import {Head , Link} from "@inertiajs/vue3";
import Tasks from "@/Components/board/Tasks.vue";
import HeaderBoard from "@/Components/board/HeaderBoard.vue";
import TheProjectAside from "@/Components/TheProjectAside.vue";
import {useProjectStore} from "@/stores/projectStore";
import {computed} from "vue";

const props = defineProps({
    versions : Object,

})

let projectStore = useProjectStore()

const goToSprint= ()=>{
    console.log("go to this sprint")
}

const pageLinks = computed(() => {
    let links = []
    for (let i = 1; i <= props.versions.last_page; i++) {
        links.push({
            label: i,
            url: props.versions.path + '?page=' + i,
        })
    }
    return links
})

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
                    <h1 class="text-3xl">
                    Versions
                    </h1>
                    <v-table >
                        <thead>
                        <tr>
                            <th class="text-left">
                                Name
                            </th>
                            <th class="text-left">
                                description
                            </th>
                            <th>
                                start date
                            </th>
                            <th>
                                type
                            </th>
                            <th>
                                status
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="item in props.versions.data"
                            :key="item.name"
                            class=" rounded border-b-2 border-gray-200 hover:bg-gray-200 cursor-pointer"
                            @click="goToSprint"
                        >
                            <td>{{ item.name }}</td>
                            <td>{{ item.description.substring(0, 30) }}</td>
                            <td>
                                {{
                                    item.start_date
                                }}
                            </td>
                            <td>
                                {{
                                    item.type
                                }}
                            </td>
                            <td>
                                {{
                                    item.status
                                }}
                            </td>
                        </tr>


                        </tbody>
                    </v-table>
                <div class="pagination">
                    <ul>
                        <li v-if="props.versions.prev_page_url">
                            <Link :href="props.versions.prev_page_url"  preserve-scroll  >Previous</Link>
                        </li>

                        <li v-for="page in pageLinks" :key="page.label">
                            <Link :href="page.url?? '#'" preserve-scroll
                            >{{ page.label }}</Link>
                        </li>

                        <li v-if="props.versions.next_page_url">
                            <Link :href="props.versions.next_page_url" preserve-scroll>Next</Link>
                        </li>
                    </ul>
                </div>


            </main>

        </section>
    </div>
</template>

<style scoped>
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
}

.pagination ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.pagination li {
    margin: 0 0.25rem;
}

.pagination li a {
    display: block;
    padding: 0.25rem 0.5rem;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 0.25rem;
    transition: all 0.2s ease-in-out;
}

.pagination li.active a,
.pagination li a:hover {
    color: #fff;
    background-color: #333;
    border-color: #333;
}

</style>
