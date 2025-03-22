
<template>
    <AuthenticatedLayout>
        <Head title="Reports / Reservation Summary" />

        <div class="py-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0 ">
                        <h3 class="text-2xl font-bold ">Reports - Reservation Summary</h3>
                    </div>

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">#</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Reservation Code</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Client</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Deceased</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Burial Plot #</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Status</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Mode of Payment</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Total Amount</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Paid</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Balance</th>
                                <!-- <th class="px-4 py-2 text-left text-gray-700 border-b">Reservation Date</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b" v-for="(item, index) in data" :key="index">
                                <td class="px-4 py-2">{{ index + 1 }}</td>
                                <td class="px-4 py-2">{{ item.reservation_code }}</td>
                                <td class="px-4 py-2">{{ item.client_name }}</td>
                                <td class="px-4 py-2">{{ item.deceased_name }}</td>
                                <td class="px-4 py-2">{{ item.burial_plot }}</td>
                                <td class="px-4 py-2">{{ item.status }}</td>
                                <td class="px-4 py-2">{{ item.mode_of_payment }}</td>
                                <td class="px-4 py-2">₱{{ item.total_amount }}</td>
                                <td class="px-4 py-2">₱{{ item.total_paid }}</td>
                                <td class="px-4 py-2">₱{{ item.balance_due }}</td>
                                <!-- <td class="px-4 py-2">{{ item.reservation_date }}</td> -->
                                <td class="px-4 py-2 flex space-x-2">
                                </td>
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
