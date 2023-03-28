

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import  TheProjectAside  from "@/Components/TheProjectAside.vue";

import { Head } from '@inertiajs/vue3';
import {onMounted} from "vue";


const props = defineProps({
    project : Object
})


onMounted(() => {
    console.log(props.project)
});

</script>


<script>

export default {
    layout : AuthenticatedLayout
}

</script>

<template>
    <Head title="Project" />
    <div class="">
            <section class="text-black flex mx-auto">
                <TheProjectAside :project="props.project" />
                <main class="flex-grow-1 text-center">
                    <h1 class="text-3xl font-bold">
                        {{ props.project.name }}
                    </h1>
                    <p class="text-gray-500">
                        {{ props.project.description }}
                    </p>

                </main>
            </section>
    </div>
</template>

<style lang="scss" scoped>

</style>
