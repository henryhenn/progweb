<script>
import AppLayout from '@/Layouts/Dashboard.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout,
        Head,
        Link
    },
    props: {
        cv: Object
    }
}
</script>

<template>
    <Head title="CV Anda"/>

    <AppLayout>
        <div class="flex flex-wrap justify-between">
            <h1 class="font-bold text-2xl">CV Anda</h1>
            <Link :href="route('test.create')"
                  class="px-4 text-white w-auto rounded-md py-2 bg-blue-500 hover:bg-blue-700 ease-in-out duration-150">
                Tambah Data Baru
            </Link>
        </div>

        <div v-if="$page.props.flash.message">
            <div id="alert-1" class="flex mt-6 p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
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

        <div class="overflow-x-auto relative mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Kelas
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Jurusan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        No. Telpon
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Alamat
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hobi
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Cita-cita
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Bahasa
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aksi
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="data in cv" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ data.nama }}
                    </th>
                    <td class="py-4 px-6">
                        {{ data.kelas }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.jurusan }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.handphone }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.alamat }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.hobi }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.citacita }}
                    </td>
                    <td class="py-4 px-6">
                        {{ data.bahasa }}
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex">
                            <Link :href="route('test.edit', data.id)"
                                  method="get"
                                  class="px-4 mr-3 text-white rounded-md py-2 bg-amber-500 hover:bg-amber-700 ease-in-out duration-150">
                                Edit
                            </Link>
                            <Link :href="route('test.destroy', data.id)"
                                  method="delete"
                                  class="px-4 text-white rounded-md py-2 bg-red-500 hover:bg-red-700 ease-in-out duration-150">
                                Delete
                            </Link>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
