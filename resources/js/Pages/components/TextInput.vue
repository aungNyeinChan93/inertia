<template>
    <label for="FirstName" class="block text-sm font-medium text-gray-700">
        {{ name }}
    </label>

    <input :type="type" v-model="model"
        :class="{'border border-red-600': error}"
        class="p-3 mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
    <div class="text-sm p-2 text-red-600 " v-show="error" v-text="error"></div>
</template>

<script setup>
defineProps({
    name:{
        type:String,
        required:true,
    },
    type:{
        type:String,
        default:'text',
    },
    error:{
        type:null,
        default:null,
        required:true,
    }
})
const model = defineModel({
    type:null,
    required:true
})
</script>

<style lang="scss" scoped></style>
