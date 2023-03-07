
<script setup>
import TheNav from "./TheNav.vue";
</script>

<template>
  <div>
    <section class="p-6 bg-gray-200">
      <header class="flex justify-between px-6">
        <h1 class="fon-bold text-xl">My App</h1>
        <TheNav />
      </header>
    </section>
    <section class="p-6">
      <div class="max-w-3xl m-auto">
        <slot />
      </div>
    </section>
  </div>
</template>


<style lang="scss" scoped>
</style>
