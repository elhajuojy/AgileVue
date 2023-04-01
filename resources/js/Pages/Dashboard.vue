<script setup lang="ts">

import { Head } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/qr-code/qr-code.js';
import '@shoelace-style/shoelace/dist/components/input/input.js';
import '@shoelace-style/shoelace/dist/components/avatar/avatar.js';
import '@shoelace-style/shoelace/dist/components/rating/rating.js';
import TextInput from "@/Components/TextInput.vue";
import { ref , reactive } from 'vue';
import TheNav from "../Shared/TheNav.vue";


interface User {
    name: string;
    age: number;

}

let user = ref<User>({
    name: 'John Doe',
    age: 30,

});

console.log(user.value.name);


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


        <main class="min-h-screen container lg:m-6 m-auto mt-6">
            <header class="flex gap-6 align-center">

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
        </main>



</template>

<style >
    .sl-avatar {
        --sl-avatar-size: 100px;
    }

    .input-search > *:focus,*:active{
        outline: none;
    }



    .input-search > input {
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        font-size: 16px;
    }
</style>
