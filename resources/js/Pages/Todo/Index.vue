<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    todos: Object,
})
</script>

<template>
    <AppLayout title="Todos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todos
            </h2>
        </template>

        <div class="max-w-7xl m-auto mt-10">
            <div class="mt-8 mb8">
                <Link :href="`/todos/create`" class="btn btn-accent">New Todo
                </Link>
            </div>
            <div class="overflow-x-auto">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr v-for="(todo, index) in todos">
                                <th>{{ index+1 }}</th>
                                <td>{{ todo.title }}</td>
                                <td>{{ todo.body.slice(0, 50) }}...</td>
                                <td>
                                    <Link :href="`/todos/${todo.slug}`" class="btn btn-warning">Edit</Link>
                                    <Link :href="`/todos/${todo.slug}`" method="delete" class="btn btn-error">Delete
                                    </Link>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
