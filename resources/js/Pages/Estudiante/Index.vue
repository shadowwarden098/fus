<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    estudiantes: {
        type: Array,
        required: true
    }
});
</script>


<template>
    <Head title="Estudiantes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Estudiantes
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <h1>Lista de Estudiantes</h1>
                <pre>{{ estudiantes }}</pre>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
