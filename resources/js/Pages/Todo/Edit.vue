<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
const props = defineProps({
    todo: Object,
    categories: Object,
})
const form = useForm({
    title: props.todo.title,
    body: props.todo.title,
    category_ids: props.todo.category_ids,
})
</script>

<template>
    <AppLayout title="Todos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Todo
            </h2>
        </template>
        <div class="max-w-7xl m-auto mt-10">
            <form @submit.prevent="form.put(`/todos/${todo.slug}`)">
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Title</span>
                    </label>
                    <input name="title" v-model="form.title" type="text" placeholder="Type here"
                        class="input input-bordered w-full max-w-xs" />
                    <label class="label">
                        <span class="label-text">Body</span>
                    </label>
                    <textarea name="body" v-model="form.body" class="textarea textarea-bordered h-24"
                        placeholder="Your detail"></textarea>
                    <label class="label">
                        <span class="label-text">Category</span>
                    </label>
                    <select multiple="true" class="select select-bordered" v-model="form.category_ids">
                        <option v-for="category in categories" :key="category.id" v-bind:value="category.id">{{
                        category.name }}</option>
                    </select>
                </div>
                <input type="submit" value="Update" class="btn btn-success">
            </form>
        </div>
    </AppLayout>
</template>
