
<template>
    <AuthenticatedLayout>
        <Head title="Reports / Deceased Burial Report" />

        <div class="py-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0 ">
                        <h3 class="text-2xl font-bold ">Reports - Deceased Burial Report</h3>
                    </div>

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">#</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Deceased</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Birth Date</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Death Date</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Cause of Death</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Burial Date</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Plot Number</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Burial Type</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b" v-for="(item, index) in data" :key="index">
                                <td class="px-4 py-2">{{ index + 1 }}</td>
                                <td class="px-4 py-2">{{ item.deceased_name }}</td>
                                <td class="px-4 py-2">{{ item.birth_date }}</td>
                                <td class="px-4 py-2">{{ item.death_date }}</td>
                                <td class="px-4 py-2">{{ item.cause_of_death }}</td>
                                <td class="px-4 py-2">{{ item.burial_date }}</td>
                                <td class="px-4 py-2">{{ item.plot_number }}</td>
                                <td class="px-4 py-2">{{ item.burial_type }}</td>
                            </tr>
                            <!-- More rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { useForm, Link, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    props: ['data'],
    components: {
        AuthenticatedLayout,
        Link,
        Head

    },
    data() {
        return {


        }
    },
    mounted() {

    },
    computed: {

    },
    methods: {

    }
}
</script>
