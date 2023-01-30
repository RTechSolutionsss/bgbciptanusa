<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Sales">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sales
            </h2>
        </template>

        <div class="py-12 sm:py-1">
            <div class="max-w-7xl mx-auto sm:pr-6 sm:pl-52">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
