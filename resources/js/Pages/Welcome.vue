<script  setup>
import { Head, Link } from "@inertiajs/vue3";
import slBadge from "@shoelace-style/shoelace/dist/components/badge/badge.js";
import { computed, onUpdated, reactive, ref } from "vue";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
  cover : String,
  main_image : String,
});

const state = reactive({
    showMenu: false,

})

const show = ref(false);






</script>

<template>
  <Head title="Welcome" />

  <div
    class=" m-auto "
  >
    <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="font-semibold text-black hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >Dashboard</Link
      >

      <template v-else>
        <Link
          :href="route('login')"
          class="font-semibold text-black hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >Log in</Link
        >

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 font-semibold text-black hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >Register</Link
        >
      </template>
    </div>
    <Header class="Home-Header">
        <div class="content m-auto">
            <h1 class="
            text-5xl text-primary-Variant font-bold mb-6
            ">Agile Vue </h1>
            <p class="text-2xl mb-2 text-gray-800">Move fast, stay aligned, and build better - together</p>
            <p class="mb-6">The #1 software development tool used by agile teams</p>
            <button class="bg-primary text-white px-4 py-2 rounded hover:bg-Primary-Variant ease-in transition-all 0.3s">
                Get Started for free
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        <img :src="cover" class="m-auto" alt="Agile Vue cover image">
    </Header>
    <section class="text-center mt-12 p-12 bg-light-blue">
        <h2 class="text-4xl  mb-6 ">All from a single source of truth</h2>
        <div class="flex gap-3 cursor-pointer justify-center">
            <v-chip  >Plan</v-chip>
            <v-chip  >Track</v-chip>
            <v-chip  >Release</v-chip>
            <v-chip  >Report</v-chip>
            <v-chip  >Automate</v-chip>
        </div>
    </section>
    <section>
        <img :src="main_image" class="w-full" alt="">
    </section>

  </div>
</template>

<style scoped>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}



.Home-Header{
    display: grid;
    grid-template-columns: 1fr 1fr;
}

@media (max-width: 768px) {
    .Home-Header{
        grid-template-columns: 1fr;
    }


}

</style>
