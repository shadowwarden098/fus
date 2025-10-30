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
      <h1 class="text-center text-2xl font-bold mb-6 text-purple-600">¡Regístrate en Mi Proyecto Anime!</h1>
      <!-- Campo: Nombre -->
      <div class="relative mb-4">
        <input
          id="name"
          type="text"
          class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
          placeholder=" "
        />
        <label for="name" class="absolute left-4 top-3 text-gray-500 transition-all duration-200">Nombre</label>
        <InputError class="mt-2 error-message" :message="form.errors.name" />
      </div>
      <!-- Campo: Correo Electrónico -->
      <div class="relative mb-4">
        <input
          id="email"
          type="email"
          class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
          v-model="form.email"
          required
          autocomplete="username"
          placeholder=" "
        />
        <label for="email" class="absolute left-4 top-3 text-gray-500 transition-all duration-200">Correo Electrónico</label>
        <InputError class="mt-2 error-message" :message="form.errors.email" />
      </div>
      <!-- Campo: Contraseña -->
      <div class="relative mb-4">
        <input
          id="password"
          type="password"
          class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
          v-model="form.password"
          required
          autocomplete="new-password"
          placeholder=" "
        />
        <label for="password" class="absolute left-4 top-3 text-gray-500 transition-all duration-200">Contraseña</label>
        <InputError class="mt-2 error-message" :message="form.errors.password" />
      </div>
      <!-- Campo: Confirmar Contraseña -->
      <div class="relative mb-4">
        <input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
          placeholder=" "
        />
        <label for="password_confirmation" class="absolute left-4 top-3 text-gray-500 transition-all duration-200">Confirmar Contraseña</label>
        <InputError class="mt-2 error-message" :message="form.errors.password_confirmation" />
      </div>
      <!-- Botón de registro y enlace a login -->
      <div class="mt-6 flex items-center justify-end">
        <Link
          :href="route('login')"
          class="text-sm text-gray-600 underline hover:text-purple-600 focus:outline-none"
        >
          ¿Ya tienes una cuenta?
        </Link>
        <PrimaryButton
          class="ms-4 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-all duration-200 transform hover:scale-105"
          :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
          :disabled="form.processing"
        >
          Registrarme
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>

<style scoped>
/* Animación para el formulario */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animated-form {
  max-width: 500px;
  margin: 2rem auto;
  padding: 2rem;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  border: 1px solid #e5e7eb;
  animation: fadeIn 0.6s ease-out forwards;
}

/* Animación para los labels */
input:focus + label,
input:not(:placeholder-shown) + label {
  transform: translateY(-12px) scale(0.8);
  color: #8b5cf6;
}

/* Estilo para los inputs */
input:focus {
  border-color: #8b5cf6;
  box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
}

/* Animación para el botón */
@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}

button:hover:not(:disabled) {
  animation: pulse 1s infinite;
}

/* Estilo para los errores */
.error-message {
  color: #ef4444;
  font-size: 0.875rem;
}
</style>
