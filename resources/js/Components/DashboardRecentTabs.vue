
<script setup>

import {onMounted, ref, reactive} from 'vue'
import axios from "axios";
import AssginedToMePreviewTable from "@/Components/Project/AssginedToMePreviewTable.vue";

const tab = ref('one')




</script>
<template>
    <v-card
    variant="plain"
    >
        <v-tabs
            v-model="tab"

        >
            <v-tab
                value="one"
                size="x-small"

            >
                Assigned to me
            </v-tab>
            <v-tab value="two"
                   size="x-small"
            >Viewed</v-tab>
            <v-tab value="three"
                   size="x-small"
            >
               Worked on
            </v-tab>
            <v-tab value="four"
                   size="x-small"
            >
                Started
            </v-tab>
        </v-tabs>

        <v-card-text>
            <v-window v-model="tab">
                <v-window-item value="one">
                    <AssginedToMePreviewTable />
                </v-window-item>

                <v-window-item value="two">
                    Two
                </v-window-item>

                <v-window-item value="three">
                    Three
                </v-window-item>
                <v-window-item value="four">
                    four
                </v-window-item>

            </v-window>
        </v-card-text>
    </v-card>
</template>

<style lang="scss" scoped>

</style>
