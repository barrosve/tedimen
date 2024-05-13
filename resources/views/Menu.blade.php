<x-app-layout>
    <x-slot name="sidebar">
        <div class="bg-gray-800 dark:bg-gray-900 shadow h-full overflow-y-auto">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight p-5">
                {{ __('Dashboard') }}
            </h2>
            <!-- Aquí puedes agregar más elementos a tu barra lateral -->
        </div>
    </x-slot>

    <div class="py-12">
        <div class="flex">
            <!-- Barra lateral -->
            <div class="w-64">
                <!-- Contenido de la barra lateral aquí -->
                <x-sidebar></x-sidebar>
            </div>

            <!-- Contenido principal -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
