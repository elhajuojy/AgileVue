<script setup>
import {Link} from "@inertiajs/vue3"
import NavLink from "./NavLink.vue";
import TextInput from "@/Components/TextInput.vue";


// console.log($page.props.logo);
</script>

<template>
    <div>
        <nav>
            <ul class="flex align-center gap-3 ">
                <img :src="$page.props.logo" alt="logo goes herre" class="w-12">
                <ul class="flex gap-2">
                    <li>AgileVue</li>
                    <li>Projects </li>
                    <li>filters</li>
                    <li>Dashboard</li>
                    <li>Apps </li>
                    <li>Create</li>
                </ul>
                <input
                    class="border-gray-300 ml-auto focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Search something ... "
                />
            </ul>
        </nav>
    </div>
</template>


<style lang="scss" scoped>

</style>
