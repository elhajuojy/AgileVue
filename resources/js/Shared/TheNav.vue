<script setup>
import {Link} from "@inertiajs/vue3"
import NavLink from "./NavLink.vue";
</script>

<template>
    <div>
        <nav>
            <ul class="flex flex-row justify-center">
                <li class="mx-2">
                    <NavLink href="/" :active="$page.component === 'Home'">
                        Home
                    </NavLink>
                </li>
                <li class="mx-2">
                    <NavLink href="/users" :active="$page.component === 'Users'">
                        Users
                    </NavLink>
                </li>

                <li class="mx-2">
                    <NavLink href="/settings" :active="$page.component === 'setttings'">
                        settings
                    </NavLink>

                </li>
                <li class="mx-2">
                    <NavLink  href="/logout" :active="$page.component === 'logout'">
                        logout
                    </NavLink>
                </li>

            </ul>
        </nav>
    </div>
</template>


<style lang="scss" scoped>

</style>
