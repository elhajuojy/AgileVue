<script setup lang="ts">

import {reactive} from "vue";
import { defineProps } from 'vue'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import {useGlobalStateStore} from "@/stores/globalState";
import axios from "axios";
import {Link, router, usePage} from '@inertiajs/vue3';
import UserAvatarMenu from "../UserAvatarMenu.vue";
import AddPeople from "@/Components/AddPeople.vue";
const props = defineProps({
    search : String || null,
    users : Object || null,
    project_id : Number || null


})



const openDialogUser = (user:Object)=>{
    state.dialog= true
    console.log(user)
    console.log()
}

const notify = (message:string) => {
    toast(message.toString(), {
        autoClose: 1500,
    }); // ToastOptions
}

const globalStore = useGlobalStateStore()

const user =globalStore.user;

const state = reactive({
    inputSearch: "",
    adminImage : "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg",
    active : true,
    user_invite_active : 0,
    inputSearchUser : "",
    users : props.users,
    dialog: false,
})

const modalAddUserShow = ()=>{
    console.log("modalAddUserShow")
    state.active =  !state.active
}

</script>

<template>
    <header class="grid header-board gap-3 mb-6">
        <h2 class="text-xl font-weight-medium text-grey-darken-3">
            {{search || 'No search' }}
        </h2>
        <div class="flex gap-3 align-center">
            <div class="border max-w-[250px]  rounded">
                <div class="flex gap-2 align-center px-2 ">
                    <input v-model="state.inputSearch" type="text" class="w-full focus:ring-0 rounded" placeholder="search something .. " />
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

            </div>
            <UserAvatarMenu
                v-for="user in props.users" :key="user.id" :user="user"
            />
            <AddPeople />
        </div>
    </header>
</template>



<style scoped>
.header-board >*{
    z-index:1 ;
}
</style>
