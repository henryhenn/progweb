<script>
import {Head} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/Dashboard.vue';
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Head,
        AppLayout
    },
    props: {
        errors: Object
    },
    setup() {
        const form = useForm({
            nama: '',
            kelas: '',
            jurusan: '',
            handphone: '',
            alamat: '',
            hobi: '',
            citacita: '',
            bahasa: '',
        });

        return {form}
    }
}
</script>

<template>
    <Head title="Tambah Data Baru" />
    <AppLayout>
        <div v-if="$page.props.flash.message">
            <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800"
                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                    {{ $page.props.flash.message }}
                </div>
                <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300"
                        data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>

        <form @submit.prevent="form.post(route('test.store'))" class="space-y-6" method="post">
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Nama Lengkap</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Masukkan Nama Lengkap Anda"
                       v-model="form.nama">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.nama">{{
                        errors.nama
                    }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Kelas</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Kelas"
                       v-model="form.kelas">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.kelas">
                    {{ errors.kelas }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Jurusan</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Jurusan Anda"
                       v-model="form.jurusan">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.jurusan">
                    {{ errors.jurusan }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">No. Handphone</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="No. Handphone Aktif"
                       v-model="form.handphone">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.handphone">
                    {{ errors.handphone }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Alamat Lengkap</label>
                <textarea type="text" id="username-error"
                          class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                          v-model="form.alamat"></textarea>
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.alamat">
                    {{ errors.alamat }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Hobi</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Bonnie Green"
                       v-model="form.hobi">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.hobi">{{
                        errors.hobi
                    }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Cita-cita</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Cita-cita"
                       v-model="form.citacita">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.citacita">
                    {{ errors.citacita }}</p>
            </div>
            <div>
                <label for="username-error"
                       class="block mb-2 text-sm font-medium text-gray-800">Bahasa yang Dikuasai</label>
                <input type="text" id="username-error"
                       class="bg-gray-50 text-sm rounded-lg block w-full p-2.5 border-blue-500"
                       placeholder="Bahasa yang kamu kuasai..."
                       v-model="form.bahasa">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors.bahasa">
                    {{ errors.bahasa }}</p>
            </div>
            <button type="submit"
                    :disabled="form.processing"
                    class="rounded-lg bg-blue-500 px-5 py-2 text-white text-md font-semibold">
                Submit
            </button>
        </form>
    </AppLayout>
</template>
