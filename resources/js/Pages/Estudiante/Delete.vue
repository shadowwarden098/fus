<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    estudiante: {
        type: Object,
        required: true
    }
});

// Estado para mostrar el botón de carga
const isDeleting = ref(false);

// Función para eliminar estudiante
const eliminarEstudiante = () => {
    if (!confirm('¿Seguro que deseas eliminar este estudiante?')) return;

    isDeleting.value = true;

    router.delete(`/estudiantes/${props.estudiante.id}`, {
        onFinish: () => (isDeleting.value = false),
    });
};
</script>

<template>
    <Head title="Eliminar Estudiante" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-3xl font-bold text-red-600">
                Eliminar Estudiante
            </h2>
            <p class="text-gray-600">
                Confirma si deseas eliminar este registro permanentemente.
            </p>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl rounded-xl p-8 border border-gray-200 text-center relative overflow-hidden">

                    <!-- Fondo decorativo -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-white opacity-70 pointer-events-none"></div>

                    <div class="relative z-10">
                        <i class="fas fa-exclamation-triangle text-6xl text-red-500 mb-4 animate-pulse"></i>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">
                            ¿Eliminar a {{ estudiante.nombre }} {{ estudiante.apellido }}?
                        </h3>

                        <p class="text-gray-600 mb-6">
                            Esta acción <strong>no se puede deshacer</strong>. Toda la información asociada
                            será eliminada permanentemente.
                        </p>

                        <div class="bg-gray-100 p-4 rounded-lg mb-6 text-left shadow-inner">
                            <p><strong>Código:</strong> {{ estudiante.codigo }}</p>
                            <p><strong>DNI:</strong> {{ estudiante.dni }}</p>
                            <p><strong>Nombre:</strong> {{ estudiante.nombre }} {{ estudiante.apellido }} {{ estudiante.segundo_apellido }}</p>
                            <p><strong>Creado:</strong> {{ new Date(estudiante.created_at).toLocaleDateString() }}</p>
                        </div>

                        <div class="flex justify-center space-x-4">
                            <!-- Botón cancelar -->
                            <Link
                                href="/estudiantes"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg font-medium transition-all duration-200 shadow"
                            >
                                <i class="fas fa-arrow-left mr-2"></i> Cancelar
                            </Link>

                            <!-- Botón eliminar -->
                            <button
                                @click="eliminarEstudiante"
                                :disabled="isDeleting"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium shadow transition-all duration-200 flex items-center"
                            >
                                <i class="fas fa-trash-alt mr-2"></i>
                                {{ isDeleting ? 'Eliminando...' : 'Eliminar definitivamente' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Animaciones suaves */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* Efecto de aparición */
@keyframes appear {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
div[role='alert'] {
    animation: appear 0.3s ease;
}
</style>
