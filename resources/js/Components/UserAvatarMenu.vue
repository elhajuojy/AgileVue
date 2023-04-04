<script setup>


const data = defineProps({
    user : {
        type : Object,
        required : true
    },
})

console.log(data.user)
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
                                        <img :src="data.user.profile_cover" class="w-full">
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
