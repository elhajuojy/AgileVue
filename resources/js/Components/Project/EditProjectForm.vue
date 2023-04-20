<script setup>
import {useProjectStore} from "@/stores/projectStore";

const projectStore = useProjectStore();

</script>
<template>
    <!-- Hire Us -->
    <!-- Hire Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-xl mx-auto">

            <div class="m-auto grid place-content-center">
                <v-avatar :image="projectStore.project.project_cover" size="100"
                class="m-auto mb-4"
                ></v-avatar>
                <form>
                    <label for="small-file-input" class="sr-only">Choose file</label>
                    <input type="file" name="small-file-input" id="small-file-input" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500
                                        file:bg-transparent file:border-0
                                        file:bg-gray-100 file:mr-4
                                        file:py-2 file:px-4
                    ">
                </form>
            </div>

            <div class="mt-12">
                <!-- Form -->
                <form>
                    <div class="grid gap-4 lg:gap-6">
                            <div>
                                <label for="name" class="block text-sm text-gray-700 font-medium "> Name</label>
                                <input type="text" name="name" id="name" class="py-3 border px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                            </div>



                        <div>
                            <label for="hs-work-email-hire-us-2" class="block text-sm text-gray-700 font-medium ">Key </label>
                            <input type="text" name="project_key" id="hs-work-email-hire-us-2" autocomplete="email" class="py-3 px-4  border block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                        </div>

                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-company-hire-us-2" class="block text-sm text-gray-700 font-medium ">Company</label>
                                <input type="text" name="hs-company-hire-us-2" id="hs-company-hire-us-2" class="py-3 px-4 block w-full border-gray-200   rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 border ">
                            </div>

                            <div>
                                <label for="hs-company-website-hire-us-2" class="block text-sm text-gray-700 font-medium ">Company Website</label>
                                <input type="text" name="hs-company-website-hire-us-2" id="hs-company-website-hire-us-2" class="py-3 border px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 ">
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div>
                            <label for="hs-about-hire-us-2" class="block text-sm text-gray-700 font-medium ">Details</label>
                            <textarea id="hs-about-hire-us-2" name="hs-about-hire-us-2" rows="4" class="py-3 px-4 border block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 "></textarea>
                        </div>
                    </div>
                    <!-- End Grid -->

                    <!-- Checkbox -->
                    <div class="mt-3 flex">
                        <div class="flex">
                            <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-1.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 ">
                        </div>

                    </div>
                    <!-- End Checkbox -->

                    <div class="mt-6 grid">
                        <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 ">
                            <span>Submit</span>
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
    <!-- End Hire Us -->
</template>

<style scoped>

</style>
