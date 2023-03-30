<script setup lang="ts">

import {reactive} from "vue";

import { defineProps } from 'vue'
const props = defineProps({
    search : String || null,
})

const state = reactive({
    inputSearch: "",
    adminImage : "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg"
})

const modalAddUserShow = ()=>{
    console.log("modalAddUserShow")
}

</script>

<template>
    <div class="grid gap-3 mb-6">
        <h2 class="text-xl font-weight-medium text-grey-darken-3">
            {{search || 'No search' }}
        </h2>
        <div class="flex gap-3 align-center">
            <div class="border max-w-[250px]  rounded">
                <div class="flex gap-2 align-center px-2 ">
                    <input v-model="state.inputSearch" type="text" class="w-full focus:ring-0 rounded" placeholder="Add something .. " />
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

            </div>
            <v-avatar :image="state.adminImage" size="30"></v-avatar>
            <button @click="modalAddUserShow" class="rounded-full w-8 h-8  hover:bg-gray-100 transition duration-200 ease-in">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
</template>


