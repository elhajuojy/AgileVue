<script setup>
import {Link} from "@inertiajs/vue3"
</script>

<template>
    <div>
        <nav>
            <ul class="flex flex-row justify-center">
                <li class="mx-2">
                    <Link href="/" class="hover:text-purple-100">Home</Link>
                </li>
                <li class="mx-2">
                    <Link href="/users" class="hover:text-purple-100">Users</Link>
                </li>

                <li class="mx-2">
                    <Link href="/settings" class="hover:text-purple-100">Settings</Link>
                </li>

            </ul>
        </nav>
    </div>
</template>


<style lang="scss" scoped>

</style>
