
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
            // @ts-ignore
            router.visit("/projects/"+projectStore.project.id,{
                method:"delete"
            })
        }
    })
}


const editProject = ()=>{
    console.log("edit project")
    menu.value = false
    // @ts-ignore
    router.visit("/projects/"+projectStore.project.id+"/edit")
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
                <button
                    @click="removeProject"
                    class="flex items-center w-full px-4 py-2 text-sm font-medium leading-5 text-left text-red-600 rounded-lg focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150"
                >
                   <span class="text-red mr-3">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                    Remove project
                </button>
                <button
                    @click="editProject"
                    class="flex items-center w-full px-4 py-2 text-sm font-medium leading-5 text-left  rounded-lg focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150"
                >
                   <span class="text-red mr-3">
                        <i class="fa-solid fa-edit"></i>
                   </span>
                    Edit project
                </button>


            </v-card>



        </v-menu>

    </div>
</template>

<style scoped>

</style>
