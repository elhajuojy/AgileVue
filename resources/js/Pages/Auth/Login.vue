<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import * as url from "url";

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
    image_cover: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});


const backgroundImage  = "" +
    "background-image: url(" + props.image_cover + ");" +
    "background-repeat: no-repeat;" +
    "background-attachment: fixed;" +
    "background-size: cover;";

const submit = () => {

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
    <div class="min-h-screen guest flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
            :style="backgroundImage"
    >


        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg"
        >

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
            <h1 class="text-2xl font-bold text-grey-darken-3 text-center">
                Login to continue
            </h1>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    place-holder="Enter your password" required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <v-btn
                type="submit"
                color="bg-blue"
                variant="tonal"
                class="w-full mt-6 bg-blue text-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            >
                Continue
            </v-btn>
            <div class="text-center mt-3">
                <p>
                    Can't login? <Link href="/register">Create an account </Link>
                </p>
                <v-divider color="success"
                class="my-3"  :thickness="4"
                ></v-divider>
                <p>

                    Create account for Agile  and <span
                class="text-blue"
                >
                    more.
                </span>
                </p>
                <p class="mt-6">
                    Privacy Policy | Terms of Service
                </p>

            </div>




<!--            <div class="flex items-center justify-end mt-4">-->
<!--                <Link-->
<!--                    v-if="canResetPassword"-->
<!--                    :href="route('password.request')"-->
<!--                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--                >-->
<!--                    Forgot your password?-->
<!--                </Link>-->
<!--                -->
<!--            </div>-->
<!--            <div class="block mt-4">-->
<!--                <label class="flex items-center">-->
<!--                    <Checkbox name="remember" v-model:checked="form.remember" />-->
<!--                    <span class="ml-2 text-sm text-gray-600">Remember me</span>-->
<!--                </label>-->
<!--            </div>-->
        </form>
    </div>
    </div>
</template>
<style scoped>

</style>
