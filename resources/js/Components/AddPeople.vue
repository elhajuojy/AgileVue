<script setup>

import {reactive} from "vue";
import {useGlobalStateStore} from "@/stores/globalState";
import axios from "axios";
import {useProjectStore} from "@/stores/projectStore";

const state = reactive({
    inputSearch: "",
    adminImage : "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg",
    active : true,
    user_invite_active : 0,
    inputSearchUser : "",
    dialog: false,
})

const globalStore = useGlobalStateStore()

const user =globalStore.user;
const projectStore = useProjectStore()

function submitInviteUser(userid){

    console.log(userid + "/" + projectStore.project.id);

    axios.post("/api/users/invite",{
        user_id : userid,
        project_id : projectStore.project.id
    }).then((response)=>{
        console.log(response)
        state.user_invite_active = userid
        console.log(state.user_invite_active)
    }).catch((error)=>{
        console.log(error)
    })

}
let searchUsers = (event) => {
    setTimeout(()=>{
        axios.get('/api/users',{
            params: {
                search: state.inputSearchUser
            }
        })
            .then((response) => {
                //bouncing the
                state.users = response.data
            })
            .catch((error) => {
                console.log(error)
            })
    },1000)





}


</script>

<script>
import InputLabel from "@/Components/InputLabel.vue";

export default {
    components: {InputLabel},
    data: () => ({
        fav: true,
        menu: false,
        message: false,
        hints: true,
    }),
}
</script>

<template>
    <div class="text-center">
        <v-menu
            v-model="menu"
            :close-on-content-click="false"
            location="end"
        >
            <template v-slot:activator="{ props }">
                <v-btn
                    variant="plain"
                    v-bind="props"
                    icon
                    size="small"
                >
                    <i class="fa-solid fa-plus"></i>
                </v-btn>
            </template>

            <v-card min-width="400" class="p-2">
                <h1 class="text-2xl font-bold  px-4 py-4">
                    Add People
                </h1>

                <v-divider></v-divider>

                <v-list>
                    <v-list-item>
                        <input v-model="state.inputSearchUser" @input="searchUsers" placeholder="type a name , group or email address" class="border w-full px-1 py-2 rounded">
                        <div class="list-users-found mx-2 z-50 bg-white">
                            <ul class="gap-2 grid  my-3 " v-if="state.users">
                                <li class="flex justify-space-between align-center gap-2" v-for="user in state.users " key="user.id">
                                    <v-avatar :image="user.profile_cover" size="30"></v-avatar>
                                    <p class="align-self-center h-full text-left mr-auto">
                                        {{ user.full_name }}
                                    </p>
                                    <button  :class="state.user_invite_active === user.id ? 'bg-green' : 'bg-blue'"  class="transition all duration-200 ease-in text-sm   rounded py-1 px-2 hover:border-gray-300"
                                             @click="submitInviteUser(user.id)"
                                    >
                                        invite
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </li>
                            </ul>
                            <div v-else>
                            </div>
                        </div>
                    </v-list-item>

                    <v-list-item>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Select a Role </label>
                        <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a Role </option>
                            <option value="US"> Adminstrator</option>
                            <option value="CA">Developer</option>
                            <option value="FR"> designer </option>
                        </select>
                    </v-list-item>
                </v-list>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        variant="text"
                        @click="menu = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="primary"
                        variant="tonal"
                        @click="menu = false"
                    >
                        Add
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-menu>
    </div>
</template>


<style lang="scss" scoped>

</style>
