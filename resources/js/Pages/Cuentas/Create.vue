<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    nombre: '',
    tipo: 'banco',
    numero_cuenta: '',
    banco: '',
    saldo_inicial: 0,
    moneda: 'PEN',
    descripcion: '',
    activo: true
});

const submit = () => {
    form.post(route('cuentas.store'));
};

const tiposCuenta = [
    { value: 'efectivo', label: 'Efectivo' },
    { value: 'banco', label: 'Cuenta Bancaria' },
    { value: 'tarjeta_credito', label: 'Tarjeta de Crédito' },
    { value: 'tarjeta_debito', label: 'Tarjeta de Débito' },
    { value: 'ahorros', label: 'Cuenta de Ahorros' }
];

const monedas = [
    { value: 'PEN', label: 'PEN - Soles' },
    { value: 'USD', label: 'USD - Dólares' },
    { value: 'EUR', label: 'EUR - Euros' }
];
</script>

<template>
    <Head title="Crear Cuenta" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Nueva Cuenta
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Nombre -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Nombre de la Cuenta *
                                    </label>
                                    <input v-model="form.nombre" type="text" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <div v-if="form.errors.nombre" class="text-red-600 text-sm mt-1">
                                        {{ form.errors.nombre }}
                                    </div>
                                </div>

                                <!-- Tipo -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Tipo de Cuenta *
                                    </label>
                                    <select v-model="form.tipo" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option v-for="tipo in tiposCuenta" :key="tipo.value" :value="tipo.value">
                                            {{ tipo.label }}
                                        </option>
                                    </select>
                                    <div v-if="form.errors.tipo" class="text-red-600 text-sm mt-1">
                                        {{ form.errors.tipo }}
                                    </div>
                                </div>

                                <!-- Banco -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Banco
                                    </label>
                                    <input v-model="form.banco" type="text"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <div v-if="form.errors.banco" class="text-red-600 text-sm mt-1">
                                        {{ form.errors.banco }}
                                    </div>
                                </div>

                                <!-- Número de Cuenta -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Número de Cuenta
                                    </label>
                                    <input v-model="form.numero_cuenta" type="text"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <div v-if="form.errors.numero_cuenta" class="text-red-600 text-sm mt-1">
                                        {{ form.errors.numero_cuenta }}
                                    </div>
                                </div>

                                <!-- Saldo Inicial y Moneda -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            Saldo Inicial *
                                        </label>
                                        <input v-model="form.saldo_inicial" type="number" step="0.01" min="0" required
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <div v-if="form.errors.saldo_inicial" class="text-red-600 text-sm mt-1">
                                            {{ form.errors.saldo_inicial }}
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">
                                            Moneda *
                                        </label>
                                        <select v-model="form.moneda" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option v-for="moneda in monedas" :key="moneda.value" :value="moneda.value">
                                                {{ moneda.label }}
                                            </option>
                                        </select>
                                        <div v-if="form.errors.moneda" class="text-red-600 text-sm mt-1">
                                            {{ form.errors.moneda }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Descripción -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                        Descripción
                                    </label>
                                    <textarea v-model="form.descripcion" rows="3"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                    <div v-if="form.errors.descripcion" class="text-red-600 text-sm mt-1">
                                        {{ form.errors.descripcion }}
                                    </div>
                                </div>

                                <!-- Activo -->
                                <div class="flex items-center">
                                    <input v-model="form.activo" type="checkbox" id="activo"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <label for="activo" class="ml-2 block text-sm text-gray-700">
                                        Cuenta Activa
                                    </label>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <Link :href="route('cuentas.index')" 
                                      class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                                    Cancelar
                                </Link>
                                <button type="submit" :disabled="form.processing"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>