<script lang="ts" setup>

import TheProjectAside from "@/Components/TheProjectAside.vue";
import { Head } from '@inertiajs/vue3';
import dragable from 'vuedraggable';
import {reactive} from "vue";

const props = defineProps({
    project: Object,
})


function log(evt:any){
    console.log(evt)
}


interface Task {
    id: number;
    description: string;
    completed: boolean;
}





const myArray = [
    {
        id:1,
        name:"mehdi"
    },
    {
        id:2,
        name:"jamal"
    }
]


const state = reactive({
        drag: false,
})

</script  >

<script lang="ts">

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

                    <section>
                        <dragable :list="myArray" :draggable="state.drag" @start="state.drag = true" @end="state.drag = false"
                                  item-key="id"
                        @change="log"
                        >
                            <template #item="{ element }">
                                <div class="list-group-item" >
                                    {{ element.name }}
                                </div>
                            </template>
                        </dragable>



                    </section>

                </main>
            </section>
        </div>
    </div>
</template>


<style  scoped>

</style>
