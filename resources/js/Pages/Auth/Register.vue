<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    image_cover: String,
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const backgroundImage = "" +
    "background-image: url(" + props.image_cover + ");" +
    "background-repeat: no-repeat;" +
    "background-attachment: fixed;" +
    "background-size: cover;";

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

        <Head title="Register" />
    <div class="min-h-screen guest flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
         :style="backgroundImage"
    >


        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg"
        >

        <form @submit.prevent="submit">
            <h1 class="text-2xl font-bold text-grey-darken-3 text-center">
                Register to continue
            </h1>

            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
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
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <v-btn
                type="submit"
                color="bg-blue"
                variant="tonal"
                class="w-full mt-6 bg-blue text-center" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
            >
                Register
            </v-btn>
            <div class="text-center mt-3">
                <p>
                    Already registered?
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                       Login
                    </Link>
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
        </form>
    </div>
</div>

</template>
