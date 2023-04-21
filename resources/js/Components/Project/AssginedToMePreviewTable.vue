<script setup>
import {onMounted, reactive} from "vue";
import axios from "axios";
import {router} from "@inertiajs/vue3";

const state = reactive({
    assignedIssues : []
})

function getAssignedIssues() {
    // get all projects where user is assigned to me
    axios.get("/api/issues/assigned").then((response) => {
        console.log(response.data);
        state.assignedIssues = response.data;
    }).catch((error) => {
        console.log(error);
    })
}

onMounted(() => {
    getAssignedIssues()
})

function goToIssue(id) {
    router.visit(`projects/${id}/board`)
    router.visit(`projects/${id}/backlog`)
}
</script>

<template>
    <v-table height="300px">
        <tbody>
        <tr
            v-for="issue in state.assignedIssues"
            :key="issue.name"
            class="hover:bg-gray-100 cursor-pointer"
            @click="goToIssue(issue.project_id)"
        >
            <td class="text-green w-6">
                <i class="fa-sharp fa-solid fa-bookmark"></i>
            </td>
            <td class="">
                <p class="">
                    {{ issue.title }}
                </p>
                <span class="text-sm">
                    {{ issue.description.substring(0,50) }}
                </span>
            </td>
        </tr>
        </tbody>
    </v-table>
</template>
