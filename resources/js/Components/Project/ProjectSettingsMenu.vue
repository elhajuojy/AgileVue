
<script setup lang="ts">
import Swal from 'sweetalert2/dist/sweetalert2.js';
import {ref} from "vue";
import {useGlobalStateStore} from "@/stores/globalState";
import {router} from "@inertiajs/vue3";
import {useProjectStore} from "@/stores/projectStore";

const menu = ref(false)
const projectStore = useProjectStore();

const removeProject = ()=>{
    console.log("remove proejct")
    menu.value = false
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this Project !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result:any) => {
        if (result.isConfirmed) {
           //seend request to delete this project
            //i need just the project Id
            router.visit("/projects/"+projectStore.project.id,{
                method:"delete"
            })
        }
    })
}

</script>
<script lang="ts">

export default {
    data: () => ({
        fav: true,
        message: false,
        hints: true,
    }),
}
</script>

<template>
    <div>
        <v-menu
            v-model="menu"
            :close-on-content-click="false"
            location="end"
        >
            <template v-slot:activator="{ props }">
               <button
               v-bind="props"
                class="text-blue"
               >
                <i class="fa-regular fa-gear"></i>
                Project Settings
               </button>
            </template>
            <v-card>
                <v-btn
                    @click="removeProject"
                >
                   <span class="text-red mr-3">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                    Remove project
                </v-btn>
            </v-card>

        </v-menu>

    </div>
</template>

<style scoped>

</style>
