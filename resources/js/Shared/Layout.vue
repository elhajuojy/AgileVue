
<script setup>
import { computed } from "vue";
import TheNav from "./TheNav.vue";
import { usePage } from "@inertiajs/vue3";

const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <div>
        <section class="p-6 bg-gray-200">
            <header class="flex justify-between px-6">
                <div class="flex items-center">
                    <h1 class="font-bold text-xl">My App</h1>
                    <p class="text-sm ml-4">Welcome Back ! {{ user.username }}</p>
                </div>
                <TheNav />
            </header>
        </section>
        <section class="p-6">
            <div class="max-w-3xl m-auto">
                <iframe class="mb-6" width="100%" frameborder="no" scrolling="no" seamless
                    src="https://player.simplecast.com/b83b0a3a-c934-480e-af5d-3007fccd57b6?dark=false"></iframe>
                <slot />
            </div>
        </section>
    </div>
</template>


<style lang="scss" scoped></style>
