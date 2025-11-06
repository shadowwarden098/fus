<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, usePage, router } from '@inertiajs/vue3'
import { ref, watchEffect } from 'vue'

// ✅ Recibir los estudiantes desde Laravel
defineProps({
  estudiantes: {
    type: Array,
    required: true
  }
})

// ✅ Obtener mensaje flash desde Laravel
const page = usePage()
const successMessage = ref(page.props.flash?.success || null)

// ✅ Ocultar automáticamente el mensaje después de 4 segundos
watchEffect(() => {
  if (successMessage.value) {
    setTimeout(() => (successMessage.value = null), 4000)
  }
})

// ✅ Función para eliminar un estudiante
const eliminarEstudiante = (id, nombre) => {
  if (!confirm(`¿Seguro que deseas eliminar a ${nombre}?`)) return
  router.delete(`/estudiantes/${id}`, {
    preserveScroll: true,
    onSuccess: () => {
      successMessage.value = 'Estudiante eliminado correctamente.'
      setTimeout(() => (successMessage.value = null), 4000)
    }
  })
}
</script>

<template>
  <Head title="Estudiantes" />

  <AuthenticatedLayout>
    <!-- ✅ Encabezado -->
    <template #header>
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-2">
          Gestión de Estudiantes
        </h2>
        <p class="text-gray-600">
          Listado de estudiantes registrados en el sistema
        </p>
      </div>
    </template>

    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- ✅ Mensaje de éxito -->
        <transition name="fade">
          <div
            v-if="successMessage"
            class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-700 flex items-center justify-between shadow-md"
          >
            <div>
              <i class="fas fa-check-circle mr-2"></i>
              {{ successMessage }}
            </div>
            <button
              @click="successMessage = null"
              class="text-green-700 hover:text-green-900 font-bold"
            >
              ×
            </button>
          </div>
        </transition>

        <!-- ✅ Botón para crear -->
        <div class="mb-6 flex justify-end">
          <Link
            href="/estudiantes/create"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center shadow-md transition-all duration-200"
          >
            <i class="fas fa-plus mr-2"></i> Nuevo Estudiante
          </Link>
        </div>

        <!-- ✅ Si no hay estudiantes -->
        <div
          v-if="estudiantes.length === 0"
          class="bg-white rounded-lg shadow p-6 text-center"
        >
          <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
          <p class="text-gray-500">No hay estudiantes registrados</p>
        </div>

        <!-- ✅ Lista de estudiantes -->
        <div
          v-else
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
          <div
            v-for="estudiante in estudiantes"
            :key="estudiante.id"
            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300"
          >
            <!-- Encabezado -->
            <div
              class="profile-header p-6 text-white"
              style="background: linear-gradient(120deg, #4361ee 0%, #3a0ca3 100%);"
            >
              <div class="flex items-center space-x-4">
                <div
                  class="h-16 w-16 rounded-full bg-white bg-opacity-20 flex items-center justify-center"
                >
                  <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <div>
                  <h3 class="text-xl font-bold">
                    {{ estudiante.nombre }} {{ estudiante.apellido }}
                    {{ estudiante.segundo_apellido || '' }}
                  </h3>
                  <p class="text-blue-100 text-sm">Estudiante</p>
                </div>
              </div>
            </div>

            <!-- Contenido -->
            <div class="p-6">
              <div class="space-y-3">
                <div class="flex items-center">
                  <i class="fas fa-id-card text-gray-500 w-5 mr-3"></i>
                  <span class="text-gray-600">
                    ID: <strong>{{ estudiante.id }}</strong>
                  </span>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-address-card text-gray-500 w-5 mr-3"></i>
                  <span class="text-gray-600">
                    DNI: <strong>{{ estudiante.dni }}</strong>
                  </span>
                </div>
                <div
                  v-if="estudiante.codigo"
                  class="flex items-center"
                >
                  <i class="fas fa-hashtag text-gray-500 w-5 mr-3"></i>
                  <span class="text-gray-600">
                    Código: <strong>{{ estudiante.codigo }}</strong>
                  </span>
                </div>
              </div>

              <!-- Acciones -->
              <div class="mt-6 flex justify-between">
                <Link
                  :href="`/estudiantes/${estudiante.id}`"
                  class="text-blue-600 hover:text-blue-800 font-medium flex items-center"
                >
                  <i class="fas fa-eye mr-2"></i> Ver
                </Link>
                <Link
                  :href="`/estudiantes/${estudiante.id}/edit`"
                  class="text-green-600 hover:text-green-800 font-medium flex items-center"
                >
                  <i class="fas fa-edit mr-2"></i> Editar
                </Link>
                <button
                  @click="eliminarEstudiante(estudiante.id, estudiante.nombre)"
                  class="text-red-600 hover:text-red-800 font-medium flex items-center"
                >
                  <i class="fas fa-trash-alt mr-2"></i> Eliminar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.profile-header {
  border-radius: 1rem 1rem 0 0;
}

/* ✨ Animación suave para el mensaje de éxito */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
