<template>
    <header class="bg-gray-200">
        <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
            <a class="block text-teal-600" href="#">
                <span class="sr-only">Home</span>
                <img v-if="$page.props.auth.user"
                    :src="$page.props.auth.user.avator ? `storage/${$page.props.auth.user.avator}` : `storage/avator/default.png`"
                    class="w-[30px] rounded-xl" alt="">
            </a>

            <div class="flex flex-1 items-center justify-end md:justify-between">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm " v-show="$page.props.auth.user">
                        <li>
                            <Link :class="{ 'text-red-600': $page.component == 'Home' }"
                                class="text-gray-500 transition hover:text-gray-500/75" :href="route('home')"> Home
                            </Link>
                        </li>

                        <li>
                            <Link :class="{ 'text-red-600': $page.component == 'About' }"
                                class="text-gray-500 transition hover:text-gray-500/75" :href="route('about')"> About
                            </Link>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Projects </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </a>
                        </li>
                    </ul>
                    <ul class="flex items-center gap-6 text-sm " v-show="!$page.props.auth.user">
                        <li>
                            <Link :class="{ 'text-red-600': $page.component == 'Guest' }"
                                class="text-gray-500 transition hover:text-gray-500/75" :href="route('guest')"> Welcome
                            </Link>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <span class="flex gap-4" v-show="!$page.props.auth.user">
                            <Link :class="{ 'bg-gray-600 text-white': $page.component == 'Auth/Login' }"
                                class="block rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:bg-teal-700"
                                :href="route('login')">
                            Login
                            </Link>

                            <Link :class="{ 'bg-gray-600 text-white': $page.component == 'Auth/Register' }"
                                class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block"
                                :href="route('register')">
                            Register
                            </Link>
                        </span>

                        <Link v-show="$page.props.auth.user" as="button" method="post" :href="route('logout')"
                            class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block">
                        Logout
                        </Link>
                    </div>

                    <button
                        class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden">
                        <span class="sr-only">Toggle menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <main>
        <slot />
    </main>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<style lang="scss" scoped></style>
