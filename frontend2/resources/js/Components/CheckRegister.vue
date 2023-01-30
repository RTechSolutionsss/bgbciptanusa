<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="sm:px-6 ml-4 mb-4">
        <div class="p-6">
            <div class="mt-8 flex justify-between">
                <p class="font-bold text-4xl">List Akun Baru</p> 
            </div>
        </div>
        <div class="flex justify-between">
            <form @submit.prevent="handleSearch">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control"
                            v-model="search"
                            placeholder="search by product name..."
                        />

                        <button
                            class="btn btn-primary input-group-text"
                            type="submit"
                        >
                            <i class="fa fa-search me-2"></i> SEARCH
                        </button>
                    </div>
                </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3">
                <div class="flex justify-between p-4">
                    <p>Customer</p>
                    <p>Date</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2>
                    <p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p>
                </div>
                <div class="mt-8 mb-4">
                    <div class="flex justify-center">
                        
                        <button
                            class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Terima
                        </button>

                        <button
                            class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Tolak
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3">
                <div class="flex justify-between p-4">
                    <p>Customer</p>
                    <p>Date</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2>
                    <p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p>
                </div>
                <div class="mt-8 mb-4">
                    <div class="flex justify-center">
                        
                        <button
                            class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Terima
                        </button>

                        <button
                            class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Tolak
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 bg-opacity-25 rounded-md w-4xl m-3">
                <div class="flex justify-between p-4">
                    <p>Customer</p>
                    <p>Date</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl uppercase px-4">PT SUKA SUKA GW</h2>
                    <p class="text-sm uppercase px-4 mt-3">Vie E-Mail {E-mail Customer}</p>
                </div>
                <div class="mt-8 mb-4">
                    <div class="flex justify-center">
                        
                        <button
                            class="btn bg-indigo-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Terima
                        </button>

                        <button
                            class="btn bg-red-600 mx-4 input-group-text rounded-lg p-3 text-white "
                            type="submit"
                        >
                            Tolak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import AppLayout from "../Layouts/AppLayout.vue";
    // import { Link } from "@inertiajs/inertia-vue3";
    // import Welcome from "@/Jetstream/Welcome.vue";
    // import { ref } from "vue";
    // import Pagination from "../Components/Pagination.vue";
    //import inertia adapter
    // import { Inertia } from "@inertiajs/inertia";
    export default {
        // components: {
        //     AppLayout,
        //     Welcome,
        //     Pagination,
        //     Link,
        // },
        // props: {
        //     undangan: Object, // <- nama props yang dibuat di controller saat parsing data
        //     hadir: String,
        //     kehadiran: String,
        //     konfirmasikehadiran: String,
        //     jumlahorang: String,
        //     tidakhadir: String,
        //     belumisi: String,
        // },
        // setup() {
        //     //define state search
        //     const search = ref(
        //         "" || new URL(document.location).searchParams.get("q")
        //     );
        //     //define method search
        //     const handleSearch = () => {
        //         Inertia.get("/invitation", {
        //             //send params "q" with value from state "search"
        //             q: search.value,
        //         });
        //     };
        //     return {
        //         search,
        //         handleSearch,
        //     };
        // },
        data() {
            return {
                editMode: false,
                isOpen: false,
                form: {
                    name: null,
                    konfirmasikehadiran: null,
                    kehadiran: null,
                    sound: null,
                },
            };
        },
        methods: {
            openModal: function () {
                this.isOpen = true;
            },
            closeModal: function () {
                this.isOpen = false;
                this.reset();
                this.editMode = false;
            },
            reset: function () {
                this.form = {
                    name: null,
                    konfirmasikehadiran: null,
                    kehadiran: null,
                    sound: true,
                };
            },
            save: function (undangan) {
                this.$inertia.post("/invitation", undangan);
                this.reset();
                this.closeModal();
                this.editMode = false;
            },
            edit: function (undangan) {
                this.form = Object.assign({}, undangan);
                this.editMode = true;
                this.openModal();
            },
            update: function (undangan) {
                undangan._method = "PUT";
                this.$inertia.post("/invitation/" + undangan.id, undangan);
                this.reset();
                this.closeModal();
            },
            deleteRow: function (undangan) {
                if (!confirm("Are you sure want to remove?")) return;
                undangan._method = "DELETE";
                this.$inertia.post("/invitation/" + undangan.id, undangan);
                this.reset();
                this.closeModal();
            },
        },
    };
</script>
