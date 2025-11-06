<template>
  <div
    class="min-h-screen flex flex-col justify-center items-center text-center relative overflow-hidden bg-black"
  >
    <!-- Fondo animado oscuro estilo Shadow Warden -->
    <div class="absolute inset-0 overflow-hidden z-0">
      <img
        src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fpics.alphacoders.com%2Fpictures%2Fview%2F593892&psig=AOvVaw3U29DiTUxqBYav05UuuHQv&ust=1762531370808000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCIiGgpXz3ZADFQAAAAAdAAAAABAj"
        alt="Shadow Warden Background"
        class="w-full h-full object-cover opacity-40 animate-fadeIn"
      />
      <div
        class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/80 to-gray-900/95"
      ></div>
    </div>

    <!-- Logo del sistema -->
    <div class="z-10 mb-8 animate-fadeDown">
      <img
        src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fepicstream.com%2Farticle%2Fcid-kagenou-powers&psig=AOvVaw3U29DiTUxqBYav05UuuHQv&ust=1762531370808000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCIiGgpXz3ZADFQAAAAAdAAAAABBG"
        alt="Logo Shadow Warden Style"
        class="w-64 mx-auto drop-shadow-[0_0_25px_rgba(255,0,0,0.6)] hover:scale-110 transition-transform duration-500"
      />
    </div>

    <!-- Título -->
    <h1
      class="z-10 text-5xl sm:text-6xl font-extrabold text-white drop-shadow-[0_0_15px_rgba(255,255,255,0.8)] animate-glow"
    >
      Bienvenido al Sistema Shadow Warden
    </h1>

    <!-- Subtítulo -->
    <p
      class="z-10 text-lg text-gray-300 mt-4 max-w-2xl leading-relaxed animate-fadeIn"
    >
      Administra estudiantes y cuentas con la elegancia de las sombras.
    </p>

    <!-- Botones -->
    <div class="z-10 mt-10 flex gap-6">
      <Link
        :href="route('login')"
        class="px-8 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white rounded-lg shadow-lg font-bold hover:from-red-500 hover:to-red-700 hover:scale-105 transition-all duration-300 border border-red-400/50"
      >
        Iniciar Sesión
      </Link>

      <Link
        :href="route('register')"
        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg shadow-lg font-bold hover:from-blue-500 hover:to-blue-700 hover:scale-105 transition-all duration-300 border border-blue-400/50"
      >
        Registrarse
      </Link>
    </div>

    <!-- Detalles decorativos animados -->
    <div
      class="absolute top-12 left-12 text-purple-500 opacity-80 animate-floating text-4xl"
    >
      ✨
    </div>
    <div
      class="absolute bottom-16 right-16 text-red-500 opacity-80 animate-floating-delay text-5xl"
    >
      ⚔️
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* Animaciones */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes fadeDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes glow {
  0%, 100% {
    text-shadow: 0 0 25px rgba(255,255,255,0.9), 0 0 45px rgba(255,0,0,0.7);
  }
  50% {
    text-shadow: 0 0 35px rgba(255,200,200,1), 0 0 60px rgba(255,50,50,0.9);
  }
}
@keyframes floating {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-12px);
  }
}

/* Clases de animación */
.animate-fadeIn {
  animation: fadeIn 1.2s ease forwards;
}
.animate-fadeDown {
  animation: fadeDown 1s ease forwards;
}
.animate-glow {
  animation: glow 3s ease-in-out infinite;
}
.animate-floating {
  animation: floating 3s ease-in-out infinite;
}
.animate-floating-delay {
  animation: floating 4s ease-in-out infinite 1s;
}
</style>
