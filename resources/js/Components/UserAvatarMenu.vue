<script setup>


import {router} from "@inertiajs/vue3";
import {useProjectStore} from "@/stores/projectStore";

const data = defineProps({
    user : {
        type : Object,
        required : true
    },
})

const projectStore = useProjectStore();

const removeUserFromPorject = ()=>{
    // i need the user id and the project id and i need to go between
    // table and delete record where id_user = this user
    //and project_id = this project
    router.visit("/api/user_project/remove",{
        method:"delete",
        data:{
            user_id : data.user.id,
            project_id :projectStore.project.id
        },

    })
}


</script>

<template>
    <div>
        <v-container
            fluid
            style="height: auto"

        >
            <v-row justify="center">
                <v-menu
                    min-width="23px"
                    rounded

                >
                    <template v-slot:activator="{ props }">

                        <v-btn
                            icon
                            v-bind="props"
                            variant="plain"
                            width="30"
                            height="30"

                        >
                            <v-avatar

                                size="30"
                                :image="data.user.profile_cover"

                            >
                            </v-avatar>
                        </v-btn>
                    </template>
                    <v-card>
                        <v-card-text>

                            <div class="mx-auto text-center">
                                <v-avatar
                                    color="brown"
                                >
                                    <span class="text-h5">
                                        <img :src="data.user.profile_image" class="w-full">
                                    </span>
                                </v-avatar>
                                <h3>
                                    {{ data.user.full_name }}
                                </h3>
                                <p class="text-caption mt-1">
                                    {{ data.user.email }}
                                </p>

                                <v-divider class="my-3"></v-divider>
                                <v-btn
                                    rounded
                                    variant="text"
                                    size="small"
                                >
                                    Edit Account
                                </v-btn>
                                <v-btn
                                    rounded
                                    variant="text"
                                    size="small"
                                    @click="removeUserFromPorject"
                                >
                                    remove
                                </v-btn>
                            </div>
                        </v-card-text>
                    </v-card>
                </v-menu>
            </v-row>
        </v-container>
    </div>
</template>



<style lang="scss" scoped>

</style>
