<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  estudiante: Object
});
</script>

<template>
  <Head title="Detalles del Estudiante" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-3xl font-bold text-gray-900">Detalles del Estudiante</h2>
        <Link href="/estudiantes" class="text-gray-600 hover:text-gray-800 flex items-center">
          <i class="fas fa-arrow-left mr-2"></i> Volver
        </Link>
      </div>
    </template>

    <div class="py-10">
      <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ estudiante.nombre }} {{ estudiante.apellido }}</h3>
        <ul class="space-y-2 text-gray-700">
          <li><strong>Código:</strong> {{ estudiante.codigo }}</li>
          <li><strong>DNI:</strong> {{ estudiante.dni }}</li>
          <li><strong>Primer Apellido:</strong> {{ estudiante.apellido }}</li>
          <li><strong>Segundo Apellido:</strong> {{ estudiante.segundo_apellido || '—' }}</li>
        </ul>

        <div class="mt-8 flex justify-end space-x-4">
          <Link
            :href="`/estudiantes/${estudiante.id}/edit`"
            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
          >
            <i class="fas fa-edit mr-2"></i> Editar
          </Link>

          <Link
            as="button"
            method="delete"
            :href="`/estudiantes/${estudiante.id}`"
            class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
            confirm="¿Estás seguro de eliminar este estudiante?"
          >
            <i class="fas fa-trash mr-2"></i> Eliminar
          </Link>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
