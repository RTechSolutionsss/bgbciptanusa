<template>
    <div class="min-h-screen pt-6 sm:pt-0 lg:pt-1 bg-gray-100">
        <div class="grid sm:grid-cols-2 sm:gap-4 sm:grid-flow-row">
            <div class="row-start-1 row-end-4 hidden sm:flex">
                <img class="object-center object-none bg-gray-300 w-0 h-0 sm:w-full m-2 md:inline items-center justify-center rounded" src="../../../public/img/login.png" style="height: 37.5rem;"/>
            </div>
            <div class="mx-4 sm:mx-10 mt-6">
                <img
                    src="../../../public/img/logo.png"
                    alt=""
                    class="ml-20 sm:ml-32 img-responsive"
                />
                <div class="w-75 sm:w-full sm:justify-center items-center sm:max-w-lg sm:max-h-lg mt-4 px-4 py-4 sm:mt-6 sm:px-6 sm:py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <!-- <slot name="logo" /> -->
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
