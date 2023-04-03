<script setup>

import {Link, router} from '@inertiajs/vue3';
import {computed} from "vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    project: Object,
    status: String,
});

console.log(props.project);


const goTothisProject = (id) => {

    if(props.project.pivot.invitation_status != 'pending'){
        router.visit(`/projects/${id}/board`)
    }
}


const acceptInvitation = ()=>{
    console.log('accept invitation')
    router.post(`/projects/${props.project.id}/accept-invitation`)
}

const declineInvitation = ()=>{
    console.log('decline invitation')
    router.post(`/projects/${props.project.id}/decline-invitation`)
}



const isPending = computed(() => {
    return props.project.pivot.invitation_status == 'pending'
})

</script>

<script>
export default {
    data: () => ({
        show: false,
    }),
}
</script>

<template>


    <v-card
        width="350"
        variant="outlined"
        class="cursor-pointer"
        @click="goTothisProject(props.project.id)"
    >
        <template v-slot:title>
           {{ props.project.name }}
            <v-chip
            variant="plain"
            >
                {{ props.project.pivot.role }}
            </v-chip>
        </template>

        <template v-slot:subtitle class="text-sm">
            {{ props.project.project_type }}
            <v-chip
                variant="plain"
                color="primary"
            >
                {{ props.project.pivot.invitation_status.toUpperCase() }}
            </v-chip>
        </template>
        <template v-slot:text>
           <div class="flex align-center  justify-space-between">
            <p class="text-sm pr-3 ">
                {{ props.project.description.substring(0, 100) }} ...
            </p>
            <div class="grid gap-2" v-if="isPending" >
                <button
                    class=" text-sm  rounded border"
                    rounded=true
                    density="comfortable"
                    variant="outlined"
                    @click="acceptInvitation"
                >
                    Accept
                </button>
                <button
                    class=" text-sm px-3"
                    rounded=true
                    density="comfortable"
                    @click="declineInvitation"
                    variant="outlined"

                >
                    Decline
                </button>
            </div>
           </div>

        </template>

    </v-card>
</template>



<style scoped>

</style>
