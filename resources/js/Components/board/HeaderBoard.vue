<script setup lang="ts">

import {reactive} from "vue";
import { defineProps } from 'vue'
import axios from "axios";
import {Link, router, usePage} from '@inertiajs/vue3';
const props = defineProps({
    search : String || null,
    users : Object || null
})


const user = usePage().props.auth.user;

const state = reactive({
    inputSearch: "",
    adminImage : "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg",
    active : true,
    inputSearchUser : "",
    users : props.users
})

const modalAddUserShow = ()=>{
    console.log("modalAddUserShow")
    state.active =  !state.active
}


let searchUsers = (event:any) => {
    setTimeout(()=>{
        axios.get('/api/users',{
            params: {
                search: state.inputSearchUser
            }
        })
            .then((response) => {
                //bouncing the
                state.users = response.data
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
    },1000)





}





</script>

<template>
    <div class="grid header-board gap-3 mb-6">
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
            <v-avatar :image="user.profile_cover" size="30"></v-avatar>
            <div class="relative w-full">
                <button @click="modalAddUserShow" class="rounded-full  w-8 h-8  hover:bg-gray-100 transition duration-200 ease-in">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <section  :class="state.active?'hidden':''" class="absolute transition duration-200 ease-in  rounded bg-white shadow">
                    <div class="flex gap-2 align-center px-2 ">
                        <input v-model="state.inputSearchUser" @input="searchUsers"  type="text" class="w-full focus:ring-0 rounded" placeholder="add users ... " />
                    </div>
                    <div class="list-users-found mx-2 z-50 bg-white">
                      <ul class="gap-2 grid  my-3 " v-if="state.users">
                          <li class="flex justify-space-between align-center gap-2" v-for="user in state.users " key="user.id">
                              <v-avatar :image="user.profile_cover" size="30"></v-avatar>
                              <p class="align-self-center h-full text-left mr-auto">
                                  {{ user.full_name }}
                              </p>
                              <Link href="/user/invite" method="post" class="hover:bg-blue-600  text-sm bg-blue  rounded py-1 px-2 hover:border-gray-300" as="button" type="button">
                                  invite
                                  <i class="fa-solid fa-plus"></i>
                              </Link>
                          </li>
                      </ul>
                        <div v-else>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</template>



<style scoped>
.header-board >*{
    z-index:1 ;
}
</style>
