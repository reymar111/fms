<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />

        <div class="py-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex flex-col md:flex-row md:justify-between md:items-center">
                        <h3 class="text-2xl font-bold">Dashboard</h3>
                    </div>

                    <div class="px-6 pb-6 bg-white shadow-md rounded-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Total Revenue Card -->
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Total Revenue</h4>
                            <p class="text-sm text-gray-500">This week</p>
                            <div class="mt-2 p-4 bg-gray-100 rounded-lg">
                                <p class="text-3xl font-bold text-green-500">₱ 6540.52</p>
                                <p class="text-sm text-gray-500">--30.25% from last week</p>
                                <p class="text-sm font-medium">Top Earning Category: <span class="font-bold">Crossover</span></p>
                            </div>
                        </div>

                        <!-- Monthly Summary -->
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Monthly Summary</h4>
                            <div class="mt-2 p-4 bg-gray-100 rounded-lg">
                                <p>Total Bookings: <span class="text-blue-500 font-bold">37</span></p>
                                <p>Completed Trips: <span class="text-green-500 font-bold">6</span></p>
                                <p>Canceled Trips: <span class="text-red-500 font-bold">31</span></p>
                            </div>
                        </div>

                        <!-- New Listings -->
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h4 class="text-lg font-semibold">New Listings</h4>
                            <div class="mt-2 p-4 bg-gray-100 rounded-lg">
                                <p>0 new cars added this week</p>
                                <p>Most popular: <span class="font-bold">Hybrid</span></p>
                            </div>
                        </div>

                        <!-- Users -->
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Users</h4>
                            <div class="mt-2 p-4 bg-gray-100 rounded-lg">
                                <p>Total Users: <span class="text-blue-500 font-bold">27</span></p>
                                <p>New Signups: <span class="text-green-500 font-bold">1</span> this week</p>
                            </div>
                        </div>

                        <!-- Customer Ratings -->
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h4 class="text-lg font-semibold">Customer Ratings</h4>
                            <div class="mt-2 p-4 bg-gray-100 rounded-lg">
                                <p>Average Rating: <span class="text-yellow-500 font-bold">3.0750/5</span></p>
                                <p>Most Praised Feature: <span class="font-bold">Quod velit beatae voluptas.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    components: {
        AuthenticatedLayout,
        Head
    }
}
</script>
