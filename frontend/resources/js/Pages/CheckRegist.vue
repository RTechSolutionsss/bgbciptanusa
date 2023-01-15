<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CheckRegister from '@/Components/CheckRegister.vue';
</script>

<template>
    <AppLayout title="Log Activity">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Log Activity
            </h2>
        </template>

        <div class="py-12 sm:py-1">
            <div class="max-w-7xl mx-auto sm:pr-6 sm:pl-52">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CheckRegister />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
