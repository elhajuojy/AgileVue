
<script setup>

import { ref } from 'vue'

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
                rounded
                size="x-small"

            >Worked on</v-tab>
            <v-tab value="two"
                   size="x-small"
                   rounded
            >Viewed</v-tab>
            <v-tab value="three"
                   rounded
                   size="x-small"
            >
                Invited
            </v-tab>
        </v-tabs>

        <v-card-text>
            <v-window v-model="tab">
                <v-window-item value="one">
                    One
                </v-window-item>

                <v-window-item value="two">
                    Two
                </v-window-item>

                <v-window-item value="three">
                    Three
                </v-window-item>
            </v-window>
        </v-card-text>
    </v-card>
</template>

<style lang="scss" scoped>

</style>
