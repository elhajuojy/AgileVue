<script setup>

</script>

<script>
export default {
    data: () => ({
        show: false,
    }),
}
</script>

<template>


    <v-card
        width="400"
        variant="outlined"
    >
        <template v-slot:title>
            This is a title
        </template>

        <template v-slot:subtitle>
            This is a subtitle
        </template>

        <template v-slot:text>
           <div class="flex align-center  justify-space-between">
            <p>
                This is content
            </p>
            <div class="grid gap-2">
                <v-btn
                    class=" text-sm"
                    rounded=true
                    density="comfortable"

                    @click="show = !show"
                    variant="outlined"
                >
                    Accept
                </v-btn>
                <v-btn
                    class=" text-sm"
                    rounded=true
                    density="comfortable"

                    @click="show = !show"
                    variant="outlined"
                >
                    Decline
                </v-btn>
            </div>
           </div>

        </template>

    </v-card>
</template>



<style scoped>

</style>
