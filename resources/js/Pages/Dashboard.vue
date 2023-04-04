<script setup lang="ts">

import { Head  } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

import '@shoelace-style/shoelace/dist/components/qr-code/qr-code.js';
import '@shoelace-style/shoelace/dist/components/input/input.js';
import '@shoelace-style/shoelace/dist/components/avatar/avatar.js';
import '@shoelace-style/shoelace/dist/components/rating/rating.js';
import TextInput from "@/Components/TextInput.vue";
import Card from "../Components/Card.vue";
import { ref , reactive } from 'vue';
import TheNav from "../Shared/TheNav.vue";
import DashboardRecentTabs from "../Components/DashboardRecentTabs.vue";


let  user = usePage().props.auth.user;

const props = defineProps({
    sharedProjects: Object,
    others_projects: Object,
});




console.log(props.sharedProjects);



interface User {
    name: string;
    age: number;

}





const qrCode = ref();

const state = reactive({
    inputSearch: "",
    adminImage: "https://upload.wikimedia.org/wikipedia/commons/5/5c/Kanye_West_at_the_2009_Tribeca_Film_Festival_%28crop_2%29.jpg",
    active: true,
    user_invite_active: 0,
    inputSearchUser: "",
});



</script>



<script lang="ts" >

import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";

export default {

    layout: AuthenticatedLayout,

}

</script>

<template>
    <Head title="Dashboard" />


        <main class="min-h-screen  container m-auto w-full px-10">
            <header class="flex gap-6 align-center ">

                <div class="border max-w-[250px] my-auto rounded">
                    <div class="flex gap-2 align-center px-2 ">
                        <input v-model="state.inputSearch" type="text" class="w-full focus:ring-0 rounded" placeholder=" " />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="max-w-lg input-search  min-w-[250px]">
                    <v-autocomplete
                        label="search"

                        :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                        variant="underlined"
                    ></v-autocomplete>
                </div>
            </header>


            <div class="invitation">
                <h2 class="text-2xl mb-6 font-weight-medium text-grey-darken-3">
                    Shard Projects with you
                </h2>
                <section class=" invite-cards ">
                    <Card v-for="project in props.sharedProjects" :key="project.id" :project="project" />
                </section>

                <section class="mt-6">
                    <h2 class="text-h4 mb-2">
                        Recent
                    </h2>

                    <DashboardRecentTabs />
                </section>
            </div>
        </main>



</template>

<style >
    .sl-avatar {
        --sl-avatar-size: 100px;
    }

    .input-search > *:focus,*:active{
        outline: none;
    }

    .invite-cards{
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .input-search > input {
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        font-size: 16px;
    }
</style>
