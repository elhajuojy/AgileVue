<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/qr-code/qr-code.js';
import '@shoelace-style/shoelace/dist/components/input/input.js';
import '@shoelace-style/shoelace/dist/components/avatar/avatar.js';
import '@shoelace-style/shoelace/dist/components/rating/rating.js';
import TextInput from "@/Components/TextInput.vue";
import { ref } from 'vue';
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
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <main class="min-h-screen">
            <h1>Projects </h1>
            <section class="container">
                <input
                    class="border-gray-300 ml-auto focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Search something ... "
                />

            </section>
        </main>



    </AuthenticatedLayout>
</template>

<style >
    .sl-avatar {
        --sl-avatar-size: 100px;
    }

</style>
