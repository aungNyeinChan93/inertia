<template>
    <Head title="Home"/>

        <div>
            <h1 class="text-red-600 text-2xl text-center p-3">Home | {{ defaultUser }}</h1>

            <p>{{ $page.props.auth.user }}</p>
            
            <div class="grid grid-cols-4 gap-4 mx-10">
                <article v-for="user in users" :key="user.id"
                    class="flex items-end justify-between rounded-lg border border-gray-100 bg-white hover:bg-green-200 p-6">
                    <div>
                        <p class="text-sm text-gray-500">{{ user.name }}</p>

                        <p class="text-xs font-medium text-gray-900">{{ user.email }}</p>
                    </div>

                    <div class="inline-flex gap-2 rounded bg-green-100 p-1 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>

                        <a href="" class="text-xs font-medium"> Detail </a>
                    </div>
                </article>
            </div>
        </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';



const page = usePage();
const props = defineProps({
    users: {
        type: Array
    }
})

const defaultUser = computed(()=>{
    return page.props.default.user;
});


</script>

<style lang="scss" scoped></style>
