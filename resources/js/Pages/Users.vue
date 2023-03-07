<script>
import Layout from "../Shared/Layout.vue";
import Pagination from "../Shared/Pagination.vue";
export default {
  // Using a render function...
  layout: (h, page) => h(Layout, [page]),

  // Using shorthand syntax...
  layout: Layout,
}
</script>

<script setup>

import {Link} from "@inertiajs/vue3"
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3'

const search = ref(props.filters.search);


watch(search, (value) => {
    console.log(value);
    router.get('/users', {  search: value  }, { preserveState: true,replace: true });

});


let props = defineProps({
    time: {
        type: String,
        required: true,
    },
    users : Object,
    filters: Object,
})


</script>

<template>
    <Head>
        <title>Users </title>
    </Head>
    <div>
        <div class="flex justify-between mb-6">
            <h1 class="font-bold text-3xl">Users</h1>
            <input type="text" v-model="search" class="border px-3 py-2 rounded-md" placeholder="search ...">
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr v-for="user in users.data" :key="user.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div>
                              <div class="text-sm font-medium text-gray-900">
                                {{ user.full_name }}
                              </div>
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                            Edit
                          </Link>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- Paginater  -->
    <div class="mt-6">
        <template v-for="link in users.links">
            <Link :href="link.url" v-if="link.url" v-html="link.label" :key="link.url" class="px-1" :class="{ 'text-gray-500': ! link.url, 'font-bold' : link.active }"/>
            <span v-else  :key="link.url" v-html="link.label" class="px-1"   :class="{ 'text-gray-500': ! link.url, 'font-bold' : link.active }"/>

        </template>
    </div>
</template>

<style lang="scss" scoped>

</style>
