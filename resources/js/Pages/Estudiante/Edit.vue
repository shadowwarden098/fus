<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  estudiante: Object
});

const form = useForm({
  nombre: props.estudiante.nombre,
  apellido: props.estudiante.apellido,
  segundo_apellido: props.estudiante.segundo_apellido,
  dni: props.estudiante.dni,
  codigo: props.estudiante.codigo,
});

const submit = () => {
  form.put(route('estudiantes.update', props.estudiante.id));
};
</script>

<template>
  <Head title="Editar Estudiante" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-3xl font-bold text-gray-900 mb-2">
            Editar Estudiante
          </h2>
          <p class="text-gray-600">Actualiza la información del estudiante</p>
        </div>
        <Link href="/estudiantes" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
          <i class="fas fa-arrow-left mr-2"></i> Volver al listado
        </Link>
      </div>
    </template>

    <div class="py-8">
      <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">
        <form @submit.prevent="submit" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
              <input v-model="form.nombre" type="text" class="w-full px-4 py-2 border rounded-lg" required />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
              <input v-model="form.apellido" type="text" class="w-full px-4 py-2 border rounded-lg" required />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Segundo Apellido</label>
              <input v-model="form.segundo_apellido" type="text" class="w-full px-4 py-2 border rounded-lg" />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
              <input v-model="form.dni" type="text" class="w-full px-4 py-2 border rounded-lg" required />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
              <input v-model="form.codigo" type="text" class="w-full px-4 py-2 border rounded-lg" required />
            </div>
          </div>

          <div class="flex justify-end space-x-4">
            <Link href="/estudiantes" class="px-6 py-2 border rounded-lg hover:bg-gray-100">Cancelar</Link>
            <button
              type="submit"
              :disabled="form.processing"
              class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50"
            >
              Guardar Cambios
            </button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
