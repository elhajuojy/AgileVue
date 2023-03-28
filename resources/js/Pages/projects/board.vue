<script setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";

import { Head } from '@inertiajs/vue3';

const props = defineProps({
    project: Object,
})



</script>
<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {

    layout: AuthenticatedLayout,

}

</script>

<template>
    <div>
        <Head title="Project" />
        <div class="">
            <section class="text-black flex mx-auto">
                <TheProjectAside :project="props.project" />
                <main class="flex-grow-1 text-center">
                   <h3>
                    This is the board page
                   </h3>

                </main>
            </section>
        </div>
    </div>
</template>


<style  scoped>

</style>
