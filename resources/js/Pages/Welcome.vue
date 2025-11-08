<template>
  <div
    class="min-h-screen flex flex-col justify-center items-center text-center relative overflow-hidden bg-black"
  >
    <!-- Fondo animado oscuro estilo Shadow Warden -->
    <div class="absolute inset-0 overflow-hidden z-0">
      <img
        src="/imagenes/shadow-background.jpg"
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
        src="/imagenes/shadow-logo.png"
        alt="Logo Shadow Warden Style"
        class="w-64 mx-auto drop-shadow-[0_0_25px_rgba(138,43,226,0.8)] hover:scale-110 transition-transform duration-500"
      />
    </div>

    <!-- Título -->
    <h1
      class="z-10 text-5xl sm:text-6xl font-extrabold text-white drop-shadow-[0_0_15px_rgba(138,43,226,0.8)] animate-glow"
    >
      Bienvenido al Sistema Shadow Garden
    </h1>

    <!-- Subtítulo -->
    <p
      class="z-10 text-lg text-gray-300 mt-4 max-w-2xl leading-relaxed animate-fadeIn"
    >
      Administra estudiantes y cuentas con la elegancia de las sombras. <br>
      <span class="text-purple-400 font-semibold italic">"I am Atomic"</span>
    </p>

    <!-- Botones -->
    <div class="z-10 mt-10 flex gap-6">
      <Link
        :href="route('login')"
        class="px-8 py-3 bg-gradient-to-r from-purple-700 to-purple-900 text-white rounded-lg shadow-lg font-bold hover:from-purple-600 hover:to-purple-800 hover:scale-105 transition-all duration-300 border border-purple-400/50 shadow-[0_0_20px_rgba(138,43,226,0.5)]"
      >
        Iniciar Sesión
      </Link>

      <Link
        :href="route('register')"
        class="px-8 py-3 bg-gradient-to-r from-slate-700 to-slate-900 text-white rounded-lg shadow-lg font-bold hover:from-slate-600 hover:to-slate-800 hover:scale-105 transition-all duration-300 border border-slate-400/50"
      >
        Registrarse
      </Link>
    </div>

    <!-- Detalles decorativos animados -->
    <div
      class="absolute top-12 left-12 text-purple-500 opacity-80 animate-floating text-4xl"
    >
      ⚡
    </div>
    <div
      class="absolute bottom-16 right-16 text-purple-400 opacity-80 animate-floating-delay text-5xl"
    >
      🌙
    </div>
    <div
      class="absolute top-1/3 right-12 text-indigo-400 opacity-60 animate-floating text-3xl"
    >
      ✨
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
    text-shadow: 0 0 25px rgba(138,43,226,0.9), 0 0 45px rgba(138,43,226,0.7);
  }
  50% {
    text-shadow: 0 0 35px rgba(186,85,211,1), 0 0 60px rgba(138,43,226,0.9);
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