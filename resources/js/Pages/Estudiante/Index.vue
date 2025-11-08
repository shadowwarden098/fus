<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'

// Recibir estudiantes desde Laravel
defineProps({
  estudiantes: {
    type: Array,
    required: true
  }
})

// Mensaje flash
const successMessage = ref(null)

// Eliminar estudiante
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

// Modal PDF
const mostrarPDF = ref(false)
const pdfVerUrl = ref(null)
const pdfDescargarUrl = ref(null)
const pdfCargando = ref(true)
const pdfError = ref(false)

// Ver PDF general (abrir en nueva pestaña)
const verPDFGeneral = () => {
  window.open('/estudiantes/pdf', '_blank')
  console.log('📄 Abriendo PDF General en nueva pestaña')
}

// Ver PDF individual (abrir en nueva pestaña)
const verPDFIndividual = (id) => {
  window.open(`/estudiantes/${id}/pdf`, '_blank')
  console.log('📄 Abriendo PDF Individual en nueva pestaña')
}

// Cerrar modal
const cerrarPDF = () => {
  mostrarPDF.value = false
  pdfVerUrl.value = null
  pdfDescargarUrl.value = null
  pdfCargando.value = true
  pdfError.value = false
}

// Manejar carga del iframe
const onIframeLoad = () => {
  pdfCargando.value = false
  console.log('✅ PDF cargado correctamente')
}

// Manejar error del iframe
const onIframeError = () => {
  pdfCargando.value = false
  pdfError.value = true
  console.error('❌ Error al cargar el PDF')
}
</script>

<template>
  <Head title="Estudiantes" />

  <AuthenticatedLayout>
    <!-- Header -->
    <template #header>
      <div class="relative">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-300 via-pink-300 to-purple-400 mb-2 tracking-wide drop-shadow-glow">
          Gestión de Estudiantes Shadow
        </h2>
        <p class="text-purple-300/70">Listado de estudiantes registrados en el sistema</p>
      </div>
    </template>

    <div class="py-10 bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 min-h-screen relative overflow-hidden">
      
      <!-- Efectos de fondo -->
      <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-float-delayed"></div>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

        <!-- Mensaje de éxito -->
        <transition name="fade" mode="out-in">
          <div v-if="successMessage" key="success" class="mb-6 p-4 rounded-lg bg-green-900/40 backdrop-blur-sm border border-green-500/50 text-green-100 flex justify-between shadow-lg shadow-green-900/20">
            <div>
              <i class="fas fa-check-circle mr-2 text-green-400"></i>
              {{ successMessage }}
            </div>
            <button @click="successMessage = null" class="text-green-300 hover:text-white font-bold transition-colors">×</button>
          </div>
        </transition>

        <!-- Botones -->
        <div class="mb-6 flex justify-end space-x-3">
          <Link
            href="/estudiantes/create"
            class="bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700 text-white px-5 py-2 rounded-lg flex items-center transition-all shadow-lg shadow-purple-900/50 hover:shadow-purple-800/60 border border-purple-500/30"
          >
            <i class="fas fa-plus mr-2"></i> Nuevo Estudiante
          </Link>

          <button
            @click="verPDFGeneral"
            class="bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-500 hover:to-indigo-700 text-white px-5 py-2 rounded-lg flex items-center transition-all shadow-lg shadow-indigo-900/50 hover:shadow-indigo-800/60 border border-indigo-500/30"
          >
            <i class="fas fa-file-pdf mr-2"></i> Ver PDF General
          </button>
        </div>

        <!-- Sin estudiantes -->
        <div v-if="estudiantes.length === 0" class="bg-slate-900/60 backdrop-blur-xl rounded-lg shadow-2xl shadow-purple-900/30 p-8 text-center text-purple-300 border border-purple-500/20">
          <i class="fas fa-users text-5xl text-purple-500/50 mb-3 animate-pulse"></i>
          <p class="text-lg">No hay estudiantes registrados en Shadow Garden</p>
        </div>

        <!-- Lista de estudiantes -->
        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="estudiante in estudiantes" :key="estudiante.id" class="rounded-xl overflow-hidden bg-slate-900/60 backdrop-blur-xl border border-purple-500/20 hover:border-purple-400/60 shadow-2xl hover:shadow-purple-900/50 transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
            
            <!-- Header del card con gradiente -->
            <div class="p-6 bg-gradient-to-r from-purple-700 via-purple-800 to-indigo-800 text-white relative overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-r from-purple-600/0 via-purple-400/20 to-purple-600/0 animate-shimmer"></div>
              <div class="flex items-center space-x-4 relative z-10">
                <div class="h-14 w-14 rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center border border-purple-300/30 shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-user-graduate text-2xl text-purple-200"></i>
                </div>
                <div>
                  <h3 class="text-xl font-bold drop-shadow-lg">{{ estudiante.nombre }} {{ estudiante.apellido }}</h3>
                  <p class="text-purple-200 text-sm flex items-center gap-1">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse shadow-lg shadow-green-400/50"></span>
                    Estudiante Activo
                  </p>
                </div>
              </div>
            </div>

            <!-- Body del card -->
            <div class="p-6 text-purple-200 space-y-2">
              <p class="flex justify-between">
                <span class="text-purple-400/70">ID:</span> 
                <span class="font-semibold">{{ estudiante.id }}</span>
              </p>
              <p class="flex justify-between">
                <span class="text-purple-400/70">DNI:</span> 
                <span class="font-semibold">{{ estudiante.dni }}</span>
              </p>
              <p v-if="estudiante.codigo" class="flex justify-between">
                <span class="text-purple-400/70">Código:</span> 
                <span class="font-semibold">{{ estudiante.codigo }}</span>
              </p>

              <!-- Acciones -->
              <div class="mt-5 pt-4 border-t border-purple-500/20 grid grid-cols-2 gap-3">
                <Link :href="`/estudiantes/${estudiante.id}`" class="text-center text-blue-400 hover:text-blue-300 hover:bg-blue-900/20 py-2 rounded-lg font-medium transition-all border border-transparent hover:border-blue-500/30">
                  <i class="fas fa-eye mr-2"></i> Ver
                </Link>
                <Link :href="`/estudiantes/${estudiante.id}/edit`" class="text-center text-green-400 hover:text-green-300 hover:bg-green-900/20 py-2 rounded-lg font-medium transition-all border border-transparent hover:border-green-500/30">
                  <i class="fas fa-edit mr-2"></i> Editar
                </Link>
                <button @click="eliminarEstudiante(estudiante.id, estudiante.nombre)" class="text-center text-red-400 hover:text-red-300 hover:bg-red-900/20 py-2 rounded-lg font-medium transition-all border border-transparent hover:border-red-500/30">
                  <i class="fas fa-trash-alt mr-2"></i> Eliminar
                </button>
                <button @click="verPDFIndividual(estudiante.id)" class="text-center text-purple-400 hover:text-purple-300 hover:bg-purple-900/20 py-2 rounded-lg font-medium transition-all border border-transparent hover:border-purple-500/30">
                  <i class="fas fa-file-pdf mr-2"></i> PDF
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal PDF -->
    <div v-if="mostrarPDF" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fadeIn" @click.self="cerrarPDF">
      <div class="relative bg-slate-900/95 backdrop-blur-xl border-2 border-purple-500/50 rounded-2xl w-full max-w-6xl h-[90vh] shadow-2xl shadow-purple-900/50 overflow-hidden flex flex-col animate-scaleUp">
        
        <!-- Header del modal -->
        <div class="flex justify-between items-center bg-gradient-to-r from-purple-700 via-purple-800 to-indigo-800 text-white px-5 py-3 flex-shrink-0 border-b border-purple-500/30">
          <h3 class="font-semibold text-lg tracking-wide flex items-center gap-2">
            <i class="fas fa-file-pdf text-purple-200"></i>
            Vista previa del PDF
          </h3>
          <div class="flex items-center space-x-3">
            <a 
              v-if="pdfDescargarUrl" 
              :href="pdfDescargarUrl" 
              target="_blank"
              class="bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-all border border-purple-400/30 hover:border-purple-300/50"
            >
              <i class="fas fa-download"></i>
              <span>Descargar</span>
            </a>
            <button @click="cerrarPDF" class="text-white hover:text-red-400 text-3xl transition-all font-bold leading-none px-2 hover:scale-110">&times;</button>
          </div>
        </div>

        <!-- Contenido del PDF -->
        <div class="flex-1 bg-slate-800 relative overflow-hidden">
          
          <!-- Indicador de carga -->
          <div v-if="pdfCargando" class="absolute inset-0 flex items-center justify-center bg-slate-900/90 backdrop-blur-sm z-10">
            <div class="text-center">
              <i class="fas fa-spinner fa-spin text-5xl text-purple-400 mb-4 drop-shadow-glow"></i>
              <p class="text-purple-200 text-lg">Cargando PDF...</p>
            </div>
          </div>

          <!-- Mensaje de error -->
          <div v-if="pdfError" class="absolute inset-0 flex items-center justify-center bg-slate-900/95 backdrop-blur-sm z-10">
            <div class="bg-red-900/60 backdrop-blur-xl border-2 border-red-500/50 text-red-100 p-8 rounded-xl text-center max-w-md shadow-2xl shadow-red-900/50">
              <i class="fas fa-exclamation-triangle text-5xl mb-4 text-red-400"></i>
              <p class="text-xl mb-2 font-bold">No se pudo cargar el PDF</p>
              <p class="text-red-200 mb-6">El navegador bloqueó la visualización o el archivo no está disponible.</p>
              <a 
                :href="pdfDescargarUrl" 
                target="_blank" 
                class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white px-6 py-3 rounded-lg inline-flex items-center space-x-2 transition-all shadow-lg"
              >
                <i class="fas fa-download"></i>
                <span>Descargar PDF</span>
              </a>
            </div>
          </div>

          <!-- Object para visualizar PDF -->
          <object 
            v-if="pdfVerUrl" 
            :data="pdfVerUrl" 
            type="application/pdf"
            class="w-full h-full border-0"
            @load="onIframeLoad"
          >
            <!-- Fallback -->
            <div class="flex items-center justify-center h-full">
              <div class="bg-yellow-900/60 backdrop-blur-xl border-2 border-yellow-500/50 text-yellow-100 p-8 rounded-xl text-center max-w-md shadow-2xl shadow-yellow-900/50">
                <i class="fas fa-info-circle text-5xl mb-4 text-yellow-400"></i>
                <p class="text-xl mb-2 font-bold">Tu navegador no puede mostrar PDFs</p>
                <p class="text-yellow-200 mb-6">Descarga el archivo para visualizarlo</p>
                <a 
                  :href="pdfDescargarUrl" 
                  target="_blank" 
                  class="bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600 text-white px-6 py-3 rounded-lg inline-flex items-center space-x-2 transition-all shadow-lg"
                >
                  <i class="fas fa-download"></i>
                  <span>Descargar PDF</span>
                </a>
              </div>
            </div>
          </object>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>

<style scoped>
/* Transiciones */
.fade-enter-active, .fade-leave-active { 
  transition: opacity 0.5s; 
}
.fade-enter-from, .fade-leave-to { 
  opacity: 0; 
}

/* Animaciones de orbes */
@keyframes float {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(30px, -30px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
}

@keyframes float-delayed {
  0%, 100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(-30px, 30px) scale(0.9);
  }
  66% {
    transform: translate(20px, -20px) scale(1.1);
  }
}

.animate-float {
  animation: float 20s ease-in-out infinite;
}

.animate-float-delayed {
  animation: float-delayed 25s ease-in-out infinite;
}

/* Animación de brillo en cards */
@keyframes shimmer {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

.animate-shimmer {
  animation: shimmer 3s ease-in-out infinite;
}

/* Efecto glow */
.drop-shadow-glow {
  filter: drop-shadow(0 0 8px rgba(168, 85, 247, 0.6));
}

/* Animación del modal */
@keyframes scaleUp {
  0% {
    transform: scale(0.9);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.animate-scaleUp {
  animation: scaleUp 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.animate-fadeIn {
  animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
</style>