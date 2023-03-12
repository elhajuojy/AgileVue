<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';
import '@shoelace-style/shoelace/dist/components/qr-code/qr-code.js';
import '@shoelace-style/shoelace/dist/components/input/input.js';
import '@shoelace-style/shoelace/dist/components/avatar/avatar.js';
import '@shoelace-style/shoelace/dist/components/rating/rating.js';
import TextInput from "@/Components/TextInput.vue";
import { ref } from 'vue';


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
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
                <div>
                    <text-input v-model="qrCode"></text-input>

                    <sl-qr-code :value="qrCode"></sl-qr-code>
                    <sl-avatar
                        image="https://images.unsplash.com/photo-1529778873920-4da4926a72c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80"
                        label="Avatar of a gray tabby kitten looking down"
                    />
                    <sl-rating value="3"
                    ></sl-rating>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style >
    .sl-avatar {
        --sl-avatar-size: 100px;
    }

</style>
