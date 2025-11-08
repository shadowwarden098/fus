<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    
    <form @submit.prevent="submit" class="animated-form">
      <!-- Logo o icono decorativo -->
      <div class="text-center mb-6">
        <div class="inline-block p-4 bg-purple-900/30 backdrop-blur-sm rounded-full border border-purple-500/30 shadow-lg shadow-purple-900/50">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
        </div>
      </div>

      <!-- Título -->
      <h1 class="text-center text-3xl font-bold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-purple-300 via-pink-300 to-purple-400 drop-shadow-glow">
        Únete a Shadow Garden
      </h1>
      <p class="text-center text-purple-300/70 mb-8 text-sm">
        Conviértete en miembro de las sombras
      </p>

      <!-- Campo: Nombre -->
      <div class="relative mb-6">
        <input
          id="name"
          type="text"
          class="mt-1 block w-full px-4 py-3 bg-slate-800/50 backdrop-blur-sm border border-purple-500/30 rounded-lg text-purple-100 placeholder-purple-400/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
          placeholder="Nombre"
        />
        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-400/50">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <InputError class="mt-2 error-message" :message="form.errors.name" />
      </div>

      <!-- Campo: Correo Electrónico -->
      <div class="relative mb-6">
        <input
          id="email"
          type="email"
          class="mt-1 block w-full px-4 py-3 bg-slate-800/50 backdrop-blur-sm border border-purple-500/30 rounded-lg text-purple-100 placeholder-purple-400/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
          v-model="form.email"
          required
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

      <!-- Campo: Contraseña -->
      <div class="relative mb-6">
        <input
          id="password"
          type="password"
          class="mt-1 block w-full px-4 py-3 bg-slate-800/50 backdrop-blur-sm border border-purple-500/30 rounded-lg text-purple-100 placeholder-purple-400/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
          v-model="form.password"
          required
          autocomplete="new-password"
          placeholder="Contraseña"
        />
        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-400/50">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
          </svg>
        </div>
        <InputError class="mt-2 error-message" :message="form.errors.password" />
      </div>

      <!-- Campo: Confirmar Contraseña -->
      <div class="relative mb-6">
        <input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full px-4 py-3 bg-slate-800/50 backdrop-blur-sm border border-purple-500/30 rounded-lg text-purple-100 placeholder-purple-400/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
          placeholder="Confirmar Contraseña"
        />
        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-purple-400/50">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <InputError class="mt-2 error-message" :message="form.errors.password_confirmation" />
      </div>

      <!-- Botón de registro y enlace a login -->
      <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <Link
          :href="route('login')"
          class="text-sm text-purple-400 hover:text-purple-300 underline focus:outline-none transition-colors"
        >
          ¿Ya tienes una cuenta?
        </Link>
        
        <PrimaryButton
          class="w-full sm:w-auto bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all duration-200 transform hover:scale-105 shadow-lg shadow-purple-900/50 hover:shadow-purple-800/60 border border-purple-500/30"
          :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
          :disabled="form.processing"
        >
          <span v-if="!form.processing" class="flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Registrarme
          </span>
          <span v-else class="flex items-center justify-center gap-2">
            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Procesando...
          </span>
        </PrimaryButton>
      </div>

      <!-- Separador decorativo -->
      <div class="relative my-8">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-purple-500/20"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-4 bg-slate-900/80 text-purple-400/70">🌙</span>
        </div>
      </div>

      <!-- Información adicional -->
      <div class="text-center">
        <p class="text-purple-300/70 text-xs">
          Al registrarte, aceptas las condiciones de Shadow Garden
        </p>
      </div>
    </form>
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
.animated-form > *:nth-child(7) { animation-delay: 0.7s; }
.animated-form > *:nth-child(8) { animation-delay: 0.8s; }
</style>