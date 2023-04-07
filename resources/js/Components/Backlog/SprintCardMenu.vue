<script lang="ts" setup>

import "@shoelace-style/shoelace/dist/components/select/select";
import "@shoelace-style/shoelace/dist/components/option/option";
import {reactive} from "vue";
import {router} from "@inertiajs/vue3";
import {toast} from "vue3-toastify";

const state = reactive({
    DeleteDialog : false,
    EditDialog : false,

})


const props = defineProps({
    project: Object,

})
const deleteSprint = ()=>{
    console.log("delete sprint")
    console.log(props.project?.project_id)
    console.log(props.project?.id)
    router.visit(`/sprint/${props.project?.project_id}/delete/${props.project?.id}`)
    state.DeleteDialog= false;
    notify("Sprint deleted successfully 👌 ! ");



}

const editSprint = ()=>{
    console.log("edit sprint")
}

const notify = (message:string) => {
    toast(message.toString(), {
        autoClose: 1500,
    }); // ToastOptions
}





</script>

<template>
    <div>
        <v-menu>
            <template v-slot:activator="{ props }">
                <button
                    v-bind="props"
                    class="bg-gray-100 px-2 py-1 hover:bg-gray-50 rounded ">
                    <i class="fa-regular fa-ellipsis"></i>
                </button>
            </template>
            <v-list
            >
                <!--                                        Edit Sprint Dialog Start -->
                <v-dialog
                    v-model="state.EditDialog"
                    width="555"

                >
                    <template v-slot:activator="{ props }">
                        <v-list-item
                            v-bind="props"
                            class="cursor-pointer text-red  "
                        >
                            <v-list-item-subtitle>
                                Edit
                            </v-list-item-subtitle>
                        </v-list-item>
                    </template>
                    <v-card>
                        <v-card-title>
                            Edit sprint {{  }}
                        </v-card-title>
                        <v-card-subtitle>
                            Are you sure you want to edit sprint AG Sprint 1?
                        </v-card-subtitle>
                        <v-card-actions>
                            <div class="flex-grow-1">
                                <v-text-field label="Sprint Name"></v-text-field>
                                <sl-select filled
                                           size="medium"
                                           placeholder="Select Duration"
                                           class="mb-4"
                                >
                                    <sl-option value="1">1</sl-option>

                                    <sl-option value="2">2</sl-option>
                                    <sl-option value="3">3</sl-option>

                                </sl-select>
                                <v-text-field label="Start Date"></v-text-field>
                                <v-text-field label="End Date"></v-text-field>
                                <v-textarea label="Sprint Goal"></v-textarea>
                                <div class="flex gap-2 justify-end">
                                    <v-btn
                                        variant="tonal"
                                        color=""
                                        class="bg-blue"
                                        @click="editSprint"
                                    >
                                        Edit
                                    </v-btn>
                                    <v-btn
                                        @click="state.EditDialog=false"
                                    >
                                        Cancel
                                    </v-btn>
                                </div>
                            </div>


                        </v-card-actions>
                    </v-card>

                </v-dialog>
                <!--                                        Edit Sprint Dialog End -->
                <!--                                            Delete Sprint start-->

                <v-dialog
                    v-model="state.DeleteDialog"
                    width="auto"
                >
                    <template v-slot:activator="{ props }">
                        <v-list-item
                                v-bind="props"
                            class="">
                            <v-list-item-subtitle
                                class="cursor-pointer text-red  "
                            >
                                Delete
                            </v-list-item-subtitle>
                        </v-list-item>
                    </template>
                    <v-card>
                        <v-card-title>
                            Delete sprint
                        </v-card-title>
                        <v-card-subtitle>
                            Are you sure you want to delete sprint AG Sprint 1?
                        </v-card-subtitle>
                        <v-card-actions>
                            <v-btn
                                variant="tonal"
                                color=""
                                class="bg-red"
                                @click="deleteSprint"
                            >
                                Delete
                            </v-btn>
                            <v-btn
                                @click="state.DeleteDialog=false"
                            >
                                Cancel
                            </v-btn>

                        </v-card-actions>
                    </v-card>
                </v-dialog>
                <!--                                            Delete Sprint end-->
            </v-list>
        </v-menu>
    </div>
</template>



<style lang="scss" scoped>

</style>
