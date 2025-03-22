<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-0 sm:justify-center sm:pt-0"
    >

<img class="rounded-full w-40 h-40" src="/logo.png" alt="image description">

        <!-- Title -->
        <div class="text-center text-3xl font-extrabold text-gray-800 sm:text-4xl">
            Funeral Cemetery Reservation System
        </div>
        <div class="text-center text-sm font-semibold text-gray-600">
            Good Sheperd Memorial Park
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
        >
            <div class="flex flex-col items-center p-6 font-bold text-lg text-gray-700">
                Sign in to your account
            </div>

            <slot />
        </div>
    </div>
</template>
