<template>

    <Head title="Home" />

    <div v-if="$page.props.flash.message" class="p-2 text-center bg-green-400 rounded mt-3 text-white mx-10">
        {{ $page.props.flash.message }}
    </div>

    <div>
        <div class="flex items-center justify-between mx-10 px-3 py-3">
            <h1 class="text-red-600 text-2xl text-center p-3">Home | {{ user ? user.name : null }}</h1>
            <div class="flex space-x-4 items-center">
                <div>
                    <input type="search" placeholder="search" v-model="search"
                        class="p-2 border border-green-300 rounded-sm">
                </div>
                <div>
                    <img class="w-[40px] rounded-xl"
                        :src="$page.props.auth.user.avator ? `storage/${$page.props.auth.user.avator}` : `storage/avator/default.png`"
                        alt="avator">
                </div>
            </div>
        </div>

        <!-- <p>{{ $page.props.auth.user }}</p> -->

        <div class="grid grid-cols-4 gap-4 mx-10">
            <article v-for="user in users.data" :key="user.id"
                class="flex items-end justify-between rounded-lg border border-gray-100 bg-white hover:bg-green-200 p-6">
                <div>
                    <p class="text-sm text-gray-500">{{ user.name }}</p>

                    <p class="text-xs font-medium text-gray-900">{{ user.email }}</p>
                </div>

                <div class="inline-flex gap-2 rounded bg-red-100 p-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>

                    <Link  as="button" method="delete" :href="route('user.destory',user.id)" class="text-xs font-medium "> Delete </Link>
                </div>
            </article>
        </div>

        <div class="pagination flex justify-between items-center py-3 mx-10">
            <p class="text-sm text-gray-400/50 "> Showing {{ users.from }} to {{ users.to }} of {{ users.total }}</p>
            <div>
                <Link :class="{ 'text-red-400': link.active , 'text-gray-100/50': !link.url }"
                    class="px-2 py-1 mx-1 rounded-xl bg-green-300 " v-for="link in users.links" :key="link.label"
                    :href="link.url" v-html="link.label" />
            </div>
        </div>

    </div>
</template>

<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { computed, reactive, ref, watch } from 'vue';
import { Link } from "@inertiajs/vue3"
import { throttle } from 'lodash';


const page = usePage();

defineProps({
    users: {
        type: Object
    },
    search_key:{
        type: String
    },
    can:{
        type:Object
    }
})

const user = computed(() => {
    return page.props.auth.user;
});

const search = ref(page.props.search_key);


watch(search, throttle((value) => {
    router.get('/', { search: value }, { preserveState: true });
}, 1000))



</script>

<style lang="scss" scoped></style>
