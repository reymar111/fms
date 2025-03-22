<template>
    <AuthenticatedLayout>
        <Head title="Reservations" />

        <div class="py-1">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-lg sm:rounded-lg"
                >
                <div class="p-6 text-gray-900 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0 ">
                    <h3 class="text-2xl font-bold ">Reservations</h3>

                </div>

                <div class="px-6 pb-6 overflow-x-auto bg-white shadow-md rounded-lg mt-0">
                    <div v-if="is_created" id="alert-border-1" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 " role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Reservation Created Successfully.
                        </div>
                        <button @click="is_created = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div v-if="is_updated" id="alert-border-1" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 " role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Reservation Updated Successfully.
                        </div>
                        <button @click="is_updated = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div v-if="is_deleted" id="alert-border-1" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 " role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Reservation Deleted Successfully.
                        </div>
                        <button @click="is_deleted = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div v-if="is_canceled" id="alert-border-1" class="flex items-center p-4 mb-4 text-teal-800 border-t-4 border-teal-300 bg-teal-50 " role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Reservation Canceled
                        </div>
                        <button @click="is_updated = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-teal-50 text-teal-500 rounded-lg focus:ring-2 focus:ring-teal-400 p-1.5 hover:bg-teal-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div v-if="is_confirmed" id="alert-border-1" class="flex items-center p-4 mb-4 text-indigo-800 border-t-4 border-indigo-300 bg-indigo-50 " role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">
                            Reservation Confirmed
                        </div>
                        <button @click="is_updated = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-indigo-50 text-indigo-500 rounded-lg focus:ring-2 focus:ring-indigo-400 p-1.5 hover:bg-indigo-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-1" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div class="mb-2 text-gray-900 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0 ">
                            <button @click="openForm" class="px-4 py-2 mb-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center space-x-2">
                                <svg class="w-6 h-6 text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                </svg>
                                    <span>New Item</span>
                            </button>

                            <!-- header -->
                            <div class="flex items-center space-x-2 w-full md:w-auto">
                                <input
                                    type="text"
                                    placeholder="Search..."
                                    v-model="search"
                                    class="px-4 py-2 border rounded-lg w-full md:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center space-x-2">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span>Search</span>
                                </button>
                            </div>

                            <!-- body -->
                        </div>


                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">#</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Code</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Deceased</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Client</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Status</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Burial Type Availed</th>
                                <th class="px-4 py-2 text-left text-gray-700 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b" v-for="(item, index) in filteredReservations" :key="index">
                                <td class="px-4 py-2">{{ index + 1 }}</td>
                                <td class="px-4 py-2">{{ item.code }}</td>
                                <td class="px-4 py-2">{{ item.deceased != null ? item.deceased.full_name : '' }}</td>
                                <td class="px-4 py-2">{{ item.client != null ? item.client.full_name : '' }}</td>
                                <td class="px-4 py-2">{{ item.status }}</td>
                                <td class="px-4 py-2">{{ item.burial_plot != null && item.burial_plot.burial_type != null ? item.burial_plot.burial_type.name : '' }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button v-if="item.status != 'Pending'" @click="viewItem(item)" type="button" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>
                                        View
                                    </button>
                                    <button v-if="item.status === 'Pending'" @click="openStatusForm(item, 'Confirmed')" type="button" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                                        <svg class="w-6 h-6 text-black-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                        </svg>

                                        Confirm
                                    </button>
                                    <button v-if="item.status === 'Pending'" @click="openStatusForm(item, 'Canceled')" type="button" class="text-white bg-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                                        <svg class="w-6 h-6 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                        </svg>


                                        Cancel
                                    </button>
                                    <button v-if="item.status === 'Pending'" @click="editItem(item)" type="button" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>
                                        Edit
                                    </button>
                                    <button v-if="item.status === 'Pending'" @click="OpenDeleteForm(item)" type="button" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2">
                                        <svg class="w-6 h-6 text-white-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                        Delete
                                    </button>

                                </td>
                            </tr>
                            <!-- More rows here -->
                        </tbody>
                    </table>
                </div>

                </div>
            </div>


        </div>

        <!-- Main modal -->
        <div  v-if="form.active" id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            {{ form.is_editing ? 'Edit' : 'Create' }} Reservation
                        </h3>
                        <button @click="closeForm" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Client</label>
                            <select v-model="form.client_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="(item, index) in clients" :key="index" :value="item.id">{{item.full_name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deceased</label>
                            <select v-model="form.deceased_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="(item, index) in deceaseds" :key="index" :value="item.id">{{item.full_name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Burial Plot</label>
                            <select v-model="form.burial_plot_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="(item, index) in burial_plots" :key="index" :value="item.id">{{item.burial_type != null ? item.burial_type.name : '' }} ({{item.size}}), {{item.burial_type != null ? '₱'+item.burial_type.price : ''}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mode of Payment</label>
                            <select v-model="form.mode_of_payment" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="(item, index) in mode_of_payments" :key="index" :value="item">{{item}}</option>
                            </select>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button @click="save" v-if="form.is_editing === false" data-modal-hide="default-modal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Save</button>
                        <button @click="update" v-if="form.is_editing" data-modal-hide="default-modal" type="button" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update</button>
                        <button @click="closeForm" data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div  v-if="delete_form.active" id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Delete this reservation?
                        </h3>
                        <button @click="closeForm" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            {{ delete_form.name }}
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button @click="deleteItem" data-modal-hide="default-modal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Yes, Delete</button>
                        <button @click="CloseDeleteForm" data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div  v-if="selected_reservation.active" id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            {{selected_reservation.status === 'Confirmed' ? 'Confirm' : ''}}{{selected_reservation.status === 'Canceled' ? 'Cancel' : ''}} this reservation?
                        </h3>
                        <button @click="closeForm" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            {{ selected_reservation.code }}
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button @click="updateStatus" data-modal-hide="default-modal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{selected_reservation.status === 'Confirmed' ? 'Confirm' : ''}}{{selected_reservation.status === 'Canceled' ? 'Cancel' : ''}}</button>
                        <button @click="CloseStatusForm" data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div v-if="view_reservation.active" id="default-modal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
            <div class="relative p-6 w-full max-w-5xl max-h-[90vh]">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-lg">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-6 border-b border-gray-200 rounded-t">
                        <h3 class="text-2xl font-semibold text-gray-900">
                            Reservation: {{ view_reservation.code }}
                        </h3>
                        <button @click="closeForm" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center"
                                data-modal-hide="default-modal">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body with two equal tables -->
                    <div class="p-6 grid grid-cols-2 gap-6">
                        <!-- Table 1 -->
                        <div class="border border-gray-300 rounded-lg shadow-sm p-4">
                            <h4 class="text-lg font-semibold mb-3">Client Details</h4>
                            <table class="min-w-full border border-gray-200">
                                <tr class="border-b">
                                    <td class="font-medium">Name:</td>
                                    <td>{{ view_reservation.client.full_name }}</td></tr>
                                <tr class="border-b">
                                    <td class="font-medium">Contact:</td>
                                    <td>{{ view_reservation.client.contact_number }}</td>
                                </tr>
                                <tr>
                                    <td class="font-medium">Address:</td><td>{{ view_reservation.client.address }}</td></tr>
                            </table>

                            <h4 class="mt-7 text-lg font-semibold mb-3">Deceased Details</h4>
                            <table class="min-w-full border border-gray-200">
                                <tr class="border-b"><td class="font-medium">Name:</td><td>{{ view_reservation.deceased.full_name }}</td></tr>
                                <tr class="border-b"><td class="font-medium">Birth Date:</td><td>{{ view_reservation.deceased.birth_date }}</td></tr>
                                <tr><td class="font-medium">Death Date:</td><td>{{ view_reservation.deceased.death_date }}</td></tr>
                                <tr><td class="font-medium">Burial Date:</td><td>{{ view_reservation.deceased.burial_date }}</td></tr>
                                <tr><td class="font-medium">Cause of Death:</td><td>{{ view_reservation.deceased.cause_of_death }}</td></tr>
                            </table>
                        </div>

                        <!-- Table 2 -->
                        <div class="border border-gray-300 rounded-lg shadow-sm p-4">
                            <h4 class="text-lg font-semibold mb-3">Payment Details</h4>
                            <table class="min-w-full border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700 border-b">#</th>
                                        <th class="px-4 py-2 text-left text-gray-700 border-b">Amount</th>
                                        <th class="px-4 py-2 text-left text-gray-700 border-b">Paid on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b" v-for="(item, index) in view_reservation.payments" :key="index">
                                        <td class="px-4 py-2">{{ index + 1 }}</td>
                                        <td class="px-4 py-2">{{ item.amount }}</td>
                                        <td class="px-4 py-2">{{ item.created_at }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="p-6 border-t border-gray-200 rounded-b">
                        <button @click="closeViewItem"
                                type="button"
                                class="w-full py-3 text-lg font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>

<script>
import { useForm, Link, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    props: ['reservations', 'clients', 'deceaseds', 'burial_plots'],
    components: {
        AuthenticatedLayout,
        Link,
        Head

    },
    data() {
        return {
            form: useForm({
                id: '',
                code: '',
                client_id: '',
                deceased_id: '',
                burial_plot_id: '',
                mode_of_payment: '',
                active: false,
                is_editing: false,
            }),

            delete_form: useForm({
                id: '',
                name: '',
                active: false,
            }),

            loading_button: false,
            disabled_button: false,
            is_created: false,
            is_updated: false,
            is_deleted: false,
            is_confirmed: false,
            is_canceled: false,

            selected_reservation: useForm({
                id: null,
                code: null,
                status: null,
                active: false,
            }),

            view_reservation: useForm({
                burial_plot: {
                    plot_number: null,
                    size: null,
                    status: null,
                    burial_type_name: null,
                },
                client: {
                    full_name: null,
                    contact_number: null,
                    address: null,
                },
                deceased: {
                    birth_date: null,
                    burial_date: null,
                    cause_of_death: null,
                    death_date: null,
                    full_name: null,
                },
                code: null,
                mode_of_payment: null,
                status: null,
                active: false,
            }),

            search: '',

            mode_of_payments: [
                'Full', 'Installment'
            ],




        }
    },
    mounted() {

    },
    computed: {
        filteredReservations() {
            if (!this.search) return this.reservations;

            return this.reservations.filter(res => {
                return Object.values(res).some(value =>
                    String(value).toLowerCase().includes(this.search.toLowerCase())
                );
            });
        }
    },
    methods: {
        viewItem(item) {
            this.view_reservation.burial_plot.plot_number = item.burial_plot != null ? item.burial_plot.plot_number : ''
            this.view_reservation.burial_plot.size = item.burial_plot != null ? item.burial_plot.size : ''
            this.view_reservation.burial_plot.size = item.burial_plot != null ? item.burial_plot.size : ''
            this.view_reservation.burial_plot.status = item.burial_plot != null ? item.burial_plot.status : ''
            this.view_reservation.burial_plot.burial_type_name = item.burial_plot != null && item.burial_plot.burial_type != null ? item.burial_plot.burial_type.name : ''
            this.view_reservation.client.full_name = item.client != null ? item.client.full_name : ''
            this.view_reservation.client.contact_number = item.client != null ? item.client.contact_number : ''
            this.view_reservation.client.address = item.client != null ? item.client.address : ''
            this.view_reservation.deceased.birth_date = item.deceased != null ? item.deceased.birth_date : ''
            this.view_reservation.deceased.burial_date = item.deceased != null ? item.deceased.burial_date : ''
            this.view_reservation.deceased.cause_of_death = item.deceased != null ? item.deceased.cause_of_death : ''
            this.view_reservation.deceased.death_date = item.deceased != null ? item.deceased.death_date : ''
            this.view_reservation.deceased.full_name = item.deceased != null ? item.deceased.full_name : ''
            this.view_reservation.payments = item.payments
            this.view_reservation.code = item.code
            this.view_reservation.mode_of_payment = item.mode_of_payment
            this.view_reservation.status = item.status
            this.view_reservation.active = true
        },

        closeViewItem() {
            this.view_reservation.burial_plot.plot_number = null
            this.view_reservation.burial_plot.size = null
            this.view_reservation.burial_plot.size = null
            this.view_reservation.burial_plot.status = null
            this.view_reservation.burial_plot.burial_type_name = null
            this.view_reservation.client.full_name = null
            this.view_reservation.client.contact_number = null
            this.view_reservation.client.address = null
            this.view_reservation.deceased.birth_date = null
            this.view_reservation.deceased.burial_date = null
            this.view_reservation.deceased.cause_of_death = null
            this.view_reservation.deceased.death_date = null
            this.view_reservation.deceased.full_name = null
            this.view_reservation.payments = []
            this.view_reservation.code = null
            this.view_reservation.mode_of_payment = null
            this.view_reservation.status = null
            this.view_reservation.active = false
        },

        openStatusForm(item, status) {
            this.selected_reservation.id = item.id
            this.selected_reservation.code = item.code
            this.selected_reservation.status = status
            this.selected_reservation.active = true
        },
        CloseStatusForm() {
            this.selected_reservation.id = null
            this.selected_reservation.code = null
            this.selected_reservation.status = null
            this.selected_reservation.active = false
        },
        openForm() {
            this.form.active = true
            this.form.is_editing = false
        },

        closeForm() {
            this.form.id = ''
            this.form.code = ''
            this.form.client_id = ''
            this.form.deceased_id = ''
            this.form.burial_plot_id = ''
            this.form.mode_of_payment = ''
            this.form.active = false
            this.form.is_editing = false
        },

        editItem(item) {
            console.log(item)
            this.form.id = item.id
            this.form.code = item.code
            this.form.client_id = item.client_id
            this.form.deceased_id = item.deceased_id
            this.form.burial_plot_id = item.burial_plot_id
            this.form.mode_of_payment = item.mode_of_payment
            this.form.active = true
            this.form.is_editing = true
        },

        OpenDeleteForm(item) {
            this.delete_form.id = item.id
            this.delete_form.name = item.code
            this.delete_form.active = true
        },

        CloseDeleteForm() {
            this.delete_form.id = ''
            this.delete_form.name = ''
            this.delete_form.active = false
        },

        save() {
            this.form.post('/reservation/store', {
                onSuccess: () => {
                    this.closeForm()
                    this.is_created = true
                },
                onError: () => {

                }
            })
        },

        update() {
            this.form.patch('/reservation/update/'+this.form.id, {
                onSuccess: () => {
                    this.closeForm()
                    this.is_updated = true
                },
                onError: () => {

                }
            })
        },

        updateStatus() {
            this.selected_reservation.patch('/reservation/update_status/'+this.selected_reservation.id, {
                onSuccess: () => {
                    this.CloseStatusForm()
                    this.is_updated = true
                },
                onError: () => {

                }
            })
        },

        deleteItem() {
            this.form.delete('/reservation/destroy/'+this.delete_form.id, {
                onSuccess: () => {
                    this.CloseDeleteForm()
                    this.is_deleted = true
                },
                onError: () => {

                }
            })
        }
    }
}
</script>
