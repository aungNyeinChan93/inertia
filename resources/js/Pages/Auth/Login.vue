<template>
    <div>

        <Head title="Login" />
        <!-- form  -->
        <div class="container mx-auto">
            <div class="max-w[200px]">
                <form @submit.prevent="formSubmit" class="mt-8 grid grid-cols-6 gap-6 mx-10 px-10">

                    <div class="col-span-6 ">
                        <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>

                        <input type="email" id="Email" name="email" v-model="form.email"
                            :class="{ 'border border-red-600': $page.props.errors.email }"
                            class="p-3 mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                        <div class="text-sm text-red-600 p-3" v-show="$page.props.errors.email">{{
                            $page.props.errors.email }}</div>
                    </div>

                    <div class="col-span-6 ">
                        <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

                        <input type="password" id="Password" name="password" v-model="form.password"
                            :class="{ 'border border-red-600': $page.props.errors.password }"
                            class="p-3 mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                        <div class="text-sm text-red-600 p-3" v-show="$page.props.errors.password">{{
                            $page.props.errors.password }}</div>
                    </div>

                    <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                        <button type="submit"
                            class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                            Login
                        </button>

                        <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                            Already have not account?
                            <Link :href="route('register')" class="text-gray-700 underline">Register</Link>.
                        </p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const formSubmit = () => {
    // console.log(form);
    router.post('login', form, { presserveStaet: true })

}
</script>

<style lang="scss" scoped></style>
