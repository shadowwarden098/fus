<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// 👇 Campos corregidos para coincidir con la BD
const form = useForm({
  nombre: '',
  apellido: '',
  segundo_apellido: '',
  dni: '',
  codigo: ''
});

const submit = () => {
  form.post(route('estudiantes.store'));
};
</script>

<template>
  <Head title="Crear Estudiante" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <div class="mb-6">
          <h2 class="text-3xl font-bold text-gray-900 mb-2">Nuevo Estudiante</h2>
          <p class="text-gray-600">Complete los datos del nuevo estudiante</p>
        </div>
        <Link
          href="/estudiantes"
          class="text-gray-600 hover:text-gray-800 font-medium flex items-center"
        >
          <i class="fas fa-arrow-left mr-2"></i> Volver al listado
        </Link>
      </div>
    </template>

    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6">
            <form @submit.prevent="submit" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                  <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre completo *
                  </label>
                  <input
                    type="text"
                    id="nombre"
                    v-model="form.nombre"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ingrese el nombre completo"
                  />
                  <p v-if="form.errors.nombre" class="mt-1 text-sm text-red-600">
                    {{ form.errors.nombre }}
                  </p>
                </div>

                <!-- Apellido -->
                <div>
                  <label for="apellido" class="block text-sm font-medium text-gray-700 mb-2">
                    Primer apellido *
                  </label>
                  <input
                    type="text"
                    id="apellido"
                    v-model="form.apellido"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Primer apellido"
                  />
                  <p v-if="form.errors.apellido" class="mt-1 text-sm text-red-600">
                    {{ form.errors.apellido }}
                  </p>
                </div>

                <!-- Segundo Apellido -->
                <div>
                  <label for="segundo_apellido" class="block text-sm font-medium text-gray-700 mb-2">
                    Segundo Apellido
                  </label>
                  <input
                    type="text"
                    id="segundo_apellido"
                    v-model="form.segundo_apellido"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Segundo apellido"
                  />
                  <p v-if="form.errors.segundo_apellido" class="mt-1 text-sm text-red-600">
                    {{ form.errors.segundo_apellido }}
                  </p>
                </div>

                <!-- DNI -->
                <div>
                  <label for="dni" class="block text-sm font-medium text-gray-700 mb-2">
                    DNI *
                  </label>
                  <input
                    type="text"
                    id="dni"
                    v-model="form.dni"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ingrese el DNI"
                  />
                  <p v-if="form.errors.dni" class="mt-1 text-sm text-red-600">
                    {{ form.errors.dni }}
                  </p>
                </div>

                <!-- Código -->
                <div>
                  <label for="codigo" class="block text-sm font-medium text-gray-700 mb-2">
                    Código *
                  </label>
                  <input
                    type="text"
                    id="codigo"
                    v-model="form.codigo"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Ingrese el código"
                  />
                  <p v-if="form.errors.codigo" class="mt-1 text-sm text-red-600">
                    {{ form.errors.codigo }}
                  </p>
                </div>
              </div>

              <!-- Botones -->
              <div class="flex justify-end space-x-4 pt-6">
                <Link
                  href="/estudiantes"
                  class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition"
                >
                  Cancelar
                </Link>
                <button
                  type="submit"
                  :disabled="form.processing"
                  class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  <span v-if="form.processing">
                    <i class="fas fa-spinner fa-spin mr-2"></i> Guardando...
                  </span>
                  <span v-else>
                    <i class="fas fa-save mr-2"></i> Guardar Estudiante
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
