<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showLogoutConfirm = ref(false);

// ✨ Confirmar cierre de sesión
function confirmLogout() {
    showLogoutConfirm.value = true;
}

function cancelLogout() {
    showLogoutConfirm.value = false;
}
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 relative overflow-hidden">
        
        <!-- 🌌 Efectos de fondo animados -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <!-- Orbes flotantes -->
            <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
            
            <!-- Partículas flotantes -->
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>

        <!-- 🌈 NAVBAR con glassmorphism -->
        <nav class="border-b border-purple-500/20 bg-slate-900/40 backdrop-blur-xl shadow-2xl shadow-purple-900/20 transition-all duration-300 z-50 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">

                    <!-- Logo + Links -->
                    <div class="flex items-center space-x-8">
                        <div class="shrink-0 relative group">
                            <Link :href="route('dashboard')">
                                <div class="absolute inset-0 bg-purple-500/20 rounded-lg blur-md group-hover:bg-purple-400/30 transition-all duration-300"></div>
                                <ApplicationLogo class="relative block h-9 w-auto text-purple-300 hover:text-purple-100 hover:scale-105 transition-all duration-200 drop-shadow-glow" />
                            </Link>
                        </div>

                        <!-- Links -->
                        <div class="hidden sm:flex space-x-6">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</NavLink>
                            <NavLink :href="route('estudiantes.index')" :active="route().current('estudiantes.*')">Estudiantes</NavLink>
                            <NavLink :href="route('cuentas.index')" :active="route().current('cuentas.*')">Cuentas</NavLink>
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="hidden sm:flex sm:items-center">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button
                                    type="button"
                                    class="inline-flex items-center gap-2 rounded-lg bg-slate-800/50 backdrop-blur-sm px-4 py-2 text-sm font-medium text-purple-200 hover:text-purple-100 hover:bg-slate-700/60 border border-purple-500/20 hover:border-purple-400/40 transition-all duration-200 shadow-lg hover:shadow-purple-500/20"
                                >
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse shadow-lg shadow-green-400/50"></div>
                                    {{ $page.props.auth.user.name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </template>

                            <template #content>
                                <div class="bg-slate-800/95 backdrop-blur-xl border border-purple-500/20 rounded-lg shadow-2xl shadow-purple-900/40 overflow-hidden">
                                    <DropdownLink :href="route('profile.edit')">Perfil</DropdownLink>

                                    <!-- 🔒 Botón con animación de confirmación -->
                                    <button
                                        @click="confirmLogout"
                                        class="w-full text-left block px-4 py-2 text-sm text-purple-200 hover:bg-red-900/30 hover:text-red-300 transition-all duration-200 border-t border-purple-500/10"
                                    >
                                        Cerrar sesión
                                    </button>
                                </div>
                            </template>
                        </Dropdown>
                    </div>

                    <!-- Botón hamburguesa -->
                    <div class="flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="rounded-lg p-2 text-purple-300 hover:bg-slate-800/60 hover:text-purple-100 transition backdrop-blur-sm border border-purple-500/20"
                        >
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    v-if="!showingNavigationDropdown"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    v-else
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menú responsive -->
            <div v-show="showingNavigationDropdown" class="sm:hidden bg-slate-900/60 backdrop-blur-xl border-t border-purple-500/20 shadow-inner animate-fadeIn">
                <div class="space-y-1 px-4 py-3">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('estudiantes.index')" :active="route().current('estudiantes.*')">Estudiantes</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('cuentas.index')" :active="route().current('cuentas.*')">Cuentas</ResponsiveNavLink>
                </div>

                <!-- Usuario móvil -->
                <div class="border-t border-purple-500/20 px-4 py-3 bg-slate-900/40">
                    <div class="text-base font-medium text-purple-200">{{ $page.props.auth.user.name }}</div>
                    <div class="text-sm font-medium text-purple-400/70">{{ $page.props.auth.user.email }}</div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">Perfil</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">Cerrar sesión</ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- 💫 Encabezado -->
        <header v-if="$slots.header" class="bg-slate-900/30 backdrop-blur-md shadow-2xl shadow-purple-900/20 border-b border-purple-500/10">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-300 via-pink-300 to-purple-400 tracking-tight drop-shadow-glow">
                    <slot name="header" />
                </h1>
            </div>
        </header>

        <!-- 🌟 Contenido -->
        <main class="py-6 animate-fadeIn relative z-10">
            <transition name="fade" mode="out-in">
                <slot />
            </transition>
        </main>

        <!-- 🧩 Modal de confirmación de logout -->
        <transition name="fade">
            <div
                v-if="showLogoutConfirm"
                class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50"
                @click="cancelLogout"
            >
                <div class="bg-slate-900/95 backdrop-blur-xl rounded-2xl shadow-2xl shadow-purple-900/50 p-6 w-80 animate-scaleUp border border-purple-500/30" @click.stop>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-purple-100">¿Cerrar sesión?</h3>
                    </div>
                    <p class="text-purple-300/80 text-sm mb-6 pl-13">
                        Tu sesión actual se cerrará y deberás volver a iniciar sesión.
                    </p>
                    <div class="flex justify-end space-x-3">
                        <button
                            @click="cancelLogout"
                            class="px-4 py-2 bg-slate-800/60 backdrop-blur-sm rounded-lg hover:bg-slate-700/60 text-purple-200 font-medium transition border border-purple-500/20 hover:border-purple-400/40"
                        >
                            Cancelar
                        </button>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-500 hover:to-red-600 font-medium shadow-lg shadow-red-900/50 hover:shadow-red-900/70 transition-all duration-200"
                        >
                            Sí, salir
                        </Link>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
/* Transiciones */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* Escala suave del modal */
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

/* Fade para el menú responsive */
.animate-fadeIn {
    animation: fadeIn 0.4s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Animaciones de orbes flotantes */
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

@keyframes pulse-slow {
    0%, 100% {
        opacity: 0.3;
        transform: scale(1);
    }
    50% {
        opacity: 0.5;
        transform: scale(1.1);
    }
}

.animate-pulse-slow {
    animation: pulse-slow 8s ease-in-out infinite;
}

/* Partículas flotantes */
.particle {
    position: absolute;
    background: radial-gradient(circle, rgba(168, 85, 247, 0.4) 0%, transparent 70%);
    border-radius: 50%;
    animation: particle-float 15s ease-in-out infinite;
}

.particle-1 {
    width: 4px;
    height: 4px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.particle-2 {
    width: 6px;
    height: 6px;
    top: 60%;
    left: 80%;
    animation-delay: 2s;
}

.particle-3 {
    width: 3px;
    height: 3px;
    top: 40%;
    left: 30%;
    animation-delay: 4s;
}

.particle-4 {
    width: 5px;
    height: 5px;
    top: 80%;
    left: 60%;
    animation-delay: 6s;
}

.particle-5 {
    width: 4px;
    height: 4px;
    top: 30%;
    left: 90%;
    animation-delay: 8s;
}

@keyframes particle-float {
    0%, 100% {
        transform: translateY(0) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100vh) translateX(50px);
        opacity: 0;
    }
}

/* Efecto de brillo en texto */
.drop-shadow-glow {
    filter: drop-shadow(0 0 8px rgba(168, 85, 247, 0.5));
}
</style>