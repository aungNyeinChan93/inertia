<template>
    <div>
        <h1>{{ about }}</h1>
        <p>{{ $page }}</p>
    </div>
</template>

<script setup>
import Demo from '../layouts/Demo.vue';

defineOptions({layout:Demo})
defineProps({
    about:String
})
</script>

<style lang="scss" scoped>

</style>
