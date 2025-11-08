<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="animated-form">
            <!-- Logo o icono decorativo -->
            <div class="text-center mb-6">
                <div class="inline-block p-4 bg-purple-900/30 backdrop-blur-sm rounded-full border border-purple-500/30 shadow-lg shadow-purple-900/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <!-- Título -->
            <h1 class="text-center text-3xl font-bold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-purple-300 via-pink-300 to-purple-400 drop-shadow-glow">
                Recupera tu Acceso
            </h1>
            <p class="text-center text-purple-300/70 mb-8 text-sm">
                Las sombras te ayudarán a regresar
            </p>

            <!-- Descripción -->
            <div class="mb-6 p-4 bg-purple-900/20 backdrop-blur-sm border border-purple-500/30 rounded-lg">
                <p class="text-sm text-purple-200/90 leading-relaxed">
                    ¿Olvidaste tu contraseña? No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña y volver a Shadow Garden.
                </p>
            </div>

            <!-- Mensaje de estado -->
            <div
                v-if="status"
                class="mb-6 p-4 bg-green-900/40 backdrop-blur-sm border border-green-500/50 rounded-lg text-green-100 text-sm flex items-center gap-3 animate-fadeIn"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ status }}</span>
            </div>

            <form @submit.prevent="submit">
                <!-- Campo: Email -->
                <div class="relative mb-6">
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full px-4 py-3 bg-slate-800/50 backdrop-blur-sm border border-purple-500/30 rounded-lg text-purple-100 placeholder-purple-400/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Correo Electrónico"
                    />
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-400/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <InputError class="mt-2 error-message" :message="form.errors.email" />
                </div>

                <!-- Botón de envío -->
                <div class="mt-6 flex flex-col gap-4">
                    <PrimaryButton
                        class="w-full bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all duration-200 transform hover:scale-105 shadow-lg shadow-purple-900/50 hover:shadow-purple-800/60 border border-purple-500/30"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        <span v-if="!form.processing" class="flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Enviar Enlace de Recuperación
                        </span>
                        <span v-else class="flex items-center justify-center gap-2">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Enviando...
                        </span>
                    </PrimaryButton>
                </div>

                <!-- Separador decorativo -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-purple-500/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-slate-900/80 text-purple-400/70">⚡</span>
                    </div>
                </div>

                <!-- Enlace para regresar al login -->
                <div class="text-center">
                    <Link
                        :href="route('login')"
                        class="inline-flex items-center gap-2 text-sm text-purple-400 hover:text-purple-300 underline focus:outline-none transition-colors"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al inicio de sesión
                    </Link>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Animación para el formulario */
@keyframes fadeIn {
  from { 
    opacity: 0; 
    transform: translateY(-30px) scale(0.95); 
  }
  to { 
    opacity: 1; 
    transform: translateY(0) scale(1); 
  }
}

.animated-form {
  max-width: 450px;
  margin: 2rem auto;
  padding: 2.5rem;
  background: rgba(15, 23, 42, 0.8);
  backdrop-filter: blur(20px);
  border-radius: 20px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(139, 92, 246, 0.2);
  border: 1px solid rgba(139, 92, 246, 0.2);
  animation: fadeIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}

/* Efecto hover en inputs */
input:hover:not(:focus) {
  border-color: rgba(139, 92, 246, 0.5);
}

/* Estilo para los inputs en focus */
input:focus {
  border-color: #8b5cf6;
  box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2), 0 0 20px rgba(139, 92, 246, 0.3);
  background: rgba(30, 41, 59, 0.6);
}

/* Animación para el botón */
@keyframes pulse-glow {
  0%, 100% { 
    box-shadow: 0 4px 20px rgba(139, 92, 246, 0.5); 
  }
  50% { 
    box-shadow: 0 4px 30px rgba(139, 92, 246, 0.8); 
  }
}

button:hover:not(:disabled) {
  animation: pulse-glow 2s ease-in-out infinite;
}

/* Estilo para los errores */
.error-message {
  color: #f87171;
  font-size: 0.875rem;
  text-shadow: 0 0 10px rgba(248, 113, 113, 0.3);
}

/* Efecto glow para el título */
.drop-shadow-glow {
  filter: drop-shadow(0 0 10px rgba(168, 85, 247, 0.6));
}

/* Animación de aparición suave escalonada */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animated-form > * {
  animation: fadeInUp 0.6s ease-out backwards;
}

.animated-form > *:nth-child(1) { animation-delay: 0.1s; }
.animated-form > *:nth-child(2) { animation-delay: 0.2s; }
.animated-form > *:nth-child(3) { animation-delay: 0.3s; }
.animated-form > *:nth-child(4) { animation-delay: 0.4s; }
.animated-form > *:nth-child(5) { animation-delay: 0.5s; }
.animated-form > *:nth-child(6) { animation-delay: 0.6s; }
</style>