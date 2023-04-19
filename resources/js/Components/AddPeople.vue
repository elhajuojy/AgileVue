<script setup>

import {reactive} from "vue";
import {useGlobalStateStore} from "@/stores/globalState";
import axios from "axios";
import {useProjectStore} from "@/stores/projectStore";
import {useForm} from "@inertiajs/vue3";

const state = reactive({
    inputSearch: "",
    adminImage : "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg",
    active : true,
    user_invite_active : 0,
    inputSearchUser : "",
    dialog: false,
    menu : false,
})

const globalStore = useGlobalStateStore()

const user =globalStore.user;
const projectStore = useProjectStore()
console.log(projectStore.users);

function submitInviteUser(userid){

    // console.log(userid + "/" + projectStore.project.id);
    console.log(form);


    form.post("/api/users/invite",{
        onSuccess: (response) => {
            console.log(response)
            state.user_invite_active = userid
            console.log(state.user_invite_active)
            state.menu = false
        },
        onError: (error) => {
            console.log(error)
        }
    })

}

const form = useForm({
    user_id : "",
    project_id : projectStore.project.id,
    role : "",
});

const filterUsers = (users) => {
    return users.filter((user) => {
        //do another loop to check if the user is already in the project
        return !projectStore.users.some((userProject) => {
            return user.id === userProject.id
        })
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
                state.users = filterUsers(response.data)
            })
            .catch((error) => {
                console.log(error)
            })
    },400)

}


</script>

<script>
import InputLabel from "@/Components/InputLabel.vue";

export default {
    components: {InputLabel},
    data: () => ({
        fav: true,
        message: false,
        hints: true,
    }),
}
</script>

<template>
    <div class="text-center">
        <v-menu
            v-model="state.menu"
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
                                             @click="state.user_invite_active = user.id; form.user_id= user.id"
                                    >
                                        Select
                                        <i v-if="state.user_invite_active !== user.id" class="fa-solid fa-plus"></i>
                                        <i v-else class="fa-solid fa-check"></i>
                                    </button>
                                </li>
                            </ul>
                            <div v-else>
                            </div>
                        </div>
                    </v-list-item>

                    <v-list-item>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Select a Role </label>
                        <select
                            v-model="form.role"
                            id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option disabled value="" >Choose a Role </option>
                            <option value="Administrator"> Administrator </option>
                            <option value="Developer">Developer</option>
                            <option value="Designer"> Designer </option>
                        </select>
                    </v-list-item>
                </v-list>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        variant="text"
                        @click="state.menu = false"
                    >
                        Cancel
                    </v-btn>
                    <v-btn
                        color="primary"
                        variant="tonal"
                        type=""
                        @click="submitInviteUser"

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
