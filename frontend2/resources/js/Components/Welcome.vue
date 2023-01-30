<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="sm:px-6 ml-4 mb-4">
        <div class="p-6">
            <div class="mt-8 flex justify-between">
                <p class="font-bold text-4xl">Management User</p>
                
                <a
                    :href="route('cekregist')"
                    class="bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white font-bold py-2 px-4  my-3"
                >
                    Check Register
                </a>
                <button
                    @click="openModal()"
                    class="bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white font-bold py-2 px-4  my-3"
                >
                    Tambah User
                </button>
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
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
        </div>
        <div>
            <table class="table-fixed w-full table-responsive">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Kota</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Foto</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        
                        class="text-center"
                    >
                        <td class="border px-4 py-2">
                        </td>
                        <td class="border px-4 py-2">
                        </td>
                        <td class="border px-4 py-2">
                        </td>
                        <td class="border px-4 py-2">
                            <Link :href="``"
                                ></Link
                            >
                        </td>
                        <td class="border px-4 py-2">
                        </td>
                        <td class="border px-4 py-2">
                            <button
                                @click="edit(undang)"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Edit
                            </button>
                            <button
                                @click="deleteRow(undang)"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div
        class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
        v-if="isOpen"
    >
        <div
            class="flex items-end justify-center min-h-screen pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 transition-opacity">
                <div
                    class="absolute inset-0 bg-gray-500 opacity-75"
                ></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
            ></span
            >​
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline"
            >
                <form>
                    <div
                        class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                    >
                        <div class="">
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Name:</label
                                >
                                <input
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1"
                                    placeholder="Enter Name"
                                    v-model="form.name"
                                />
                                <!-- <div
                                    v-if="
                                        $page.props.flash.name
                                    "
                                    class="text-red-500"
                                >
                                    {{
                                        $page.props.flash
                                            .name[0]
                                    }}
                                </div> -->
                            </div>
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Kehadiran:</label
                                >
                                <input
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1"
                                    placeholder="Enter kehadiran"
                                    v-model="form.kehadiran"
                                />
                                <!-- <div
                                    v-if="
                                        $page.props.flash
                                            .kehadiran
                                    "
                                    class="text-red-500"
                                >
                                    {{
                                        $page.props.flash
                                            .kehadiran[0]
                                    }}
                                </div> -->
                            </div>
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Konfirmasi
                                    Kehadiran:</label
                                >
                                <input
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1"
                                    placeholder="Enter konfirmasikehadiran"
                                    v-model="
                                        form.konfirmasikehadiran
                                    "
                                />
                                <!-- <div
                                    v-if="
                                        $page.props.flash
                                            .konfirmasikehadiran
                                    "
                                    class="text-red-500"
                                >
                                    {{
                                        $page.props.flash
                                            .konfirmasikehadiran[0]
                                    }}
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <span
                            class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                        >
                            <button
                                wire:click.prevent="store()"
                                type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                v-show="!editMode"
                                @click="save(form)"
                            >
                                Save
                            </button>
                        </span>
                        <span
                            class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                        >
                            <button
                                wire:click.prevent="store()"
                                type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                v-show="editMode"
                                @click="update(form)"
                            >
                                Update
                            </button>
                        </span>
                        <span
                            class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                        >
                            <button
                                @click="closeModal()"
                                type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                            >
                                Cancel
                            </button>
                        </span>
                    </div>
                </form>
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
