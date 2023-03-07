
<script setup >
import TheNavVue from "../Shared/TheNav.vue";
import "@shoelace-style/shoelace/dist/components/qr-code/qr-code.js";
import "@shoelace-style/shoelace/dist/components/input/input.js";
import "@shoelace-style/shoelace/dist/components/avatar/avatar.js";

defineProps({
    name: {
        type: String,
        required: true,
    },
    hobbies: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head>
        <!-- <title>AgileVue - Home</title> -->
        <meta name="description" content="this is changes Home description" head-key="description" />
    </Head>
    <div class="avatar-group">
        <sl-avatar
          image="https://images.unsplash.com/photo-1490150028299-bf57d78394e0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&q=80&crop=right"
          label="Avatar 1 of 4"
        ></sl-avatar>

        <sl-avatar
          image="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&crop=left&q=80"
          label="Avatar 2 of 4"
        ></sl-avatar>

        <sl-avatar
          image="https://images.unsplash.com/photo-1456439663599-95b042d50252?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&crop=left&q=80"
          label="Avatar 3 of 4"
        ></sl-avatar>

        <sl-avatar
          image="https://images.unsplash.com/flagged/photo-1554078875-e37cb8b0e27d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&crop=top&q=80"
          label="Avatar 4 of 4"
        ></sl-avatar>
      </div>
</template>

<style  scoped>
.avatar-group sl-avatar:not(:first-of-type) {
    margin-left: -1rem;
  }

  .avatar-group sl-avatar::part(base) {
    border: solid 2px var(--sl-color-neutral-0);
  }
</style>
