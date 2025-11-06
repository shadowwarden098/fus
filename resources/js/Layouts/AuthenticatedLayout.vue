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
    <div class="min-h-screen bg-gray-100 relative overflow-hidden">

        <!-- 🌈 NAVBAR -->
        <nav class="border-b border-gray-200 bg-white/80 backdrop-blur-md shadow-sm transition-all duration-300 z-50 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">

                    <!-- Logo + Links -->
                    <div class="flex items-center space-x-8">
                        <div class="shrink-0">
                            <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto text-gray-700 hover:scale-105 transition-transform duration-200" />
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
                                    class="inline-flex items-center gap-1 rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 transition-all duration-150"
                                >
                                    {{ $page.props.auth.user.name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">Perfil</DropdownLink>

                                <!-- 🔒 Botón con animación de confirmación -->
                                <button
                                    @click="confirmLogout"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200"
                                >
                                    Cerrar sesión
                                </button>
                            </template>
                        </Dropdown>
                    </div>

                    <!-- Botón hamburguesa -->
                    <div class="flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="rounded-md p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition"
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
            <div v-show="showingNavigationDropdown" class="sm:hidden bg-white border-t border-gray-200 shadow-inner animate-fadeIn">
                <div class="space-y-1 px-4 py-3">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('estudiantes.index')" :active="route().current('estudiantes.*')">Estudiantes</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('cuentas.index')" :active="route().current('cuentas.*')">Cuentas</ResponsiveNavLink>
                </div>

                <!-- Usuario móvil -->
                <div class="border-t border-gray-100 px-4 py-3 bg-gray-50">
                    <div class="text-base font-medium text-gray-800">{{ $page.props.auth.user.name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">Perfil</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">Cerrar sesión</ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- 💫 Encabezado -->
        <header v-if="$slots.header" class="bg-white/90 backdrop-blur-sm shadow-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-semibold text-gray-800 tracking-tight">
                    <slot name="header" />
                </h1>
            </div>
        </header>

        <!-- 🌟 Contenido -->
        <main class="py-6 animate-fadeIn">
            <transition name="fade" mode="out-in">
                <slot />
            </transition>
        </main>

        <!-- 🧩 Modal de confirmación de logout -->
        <transition name="fade">
            <div
                v-if="showLogoutConfirm"
                class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
            >
                <div class="bg-white rounded-lg shadow-xl p-6 w-80 animate-scaleUp">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">¿Cerrar sesión?</h3>
                    <p class="text-gray-600 text-sm mb-5">
                        Tu sesión actual se cerrará y deberás volver a iniciar sesión.
                    </p>
                    <div class="flex justify-end space-x-3">
                        <button
                            @click="cancelLogout"
                            class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 text-gray-700 font-medium transition"
                        >
                            Cancelar
                        </button>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium shadow-sm transition"
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
        transform: scale(0.95);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
.animate-scaleUp {
    animation: scaleUp 0.25s ease-out;
}

/* Fade para el menú responsive */
.animate-fadeIn {
    animation: fadeIn 0.4s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
