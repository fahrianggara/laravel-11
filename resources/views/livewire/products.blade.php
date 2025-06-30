<div>
    <div class="w-full">
        <div class="flex flex-col-reverse md:flex-row md:justify-between md:items-center gap-2 mb-4">
            <input type="text" placeholder="Search..."
                class="border rounded-lg px-4 py-2 md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-product"
                data-hs-overlay="#modal-product"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-center w-[130px] ml-auto md:ml-0
                hover:bg-blue-700">
                Add Product
            </button>
        </div>

        <x-table :headers="['Product name', 'Description', 'Stock', 'Price', 'Image', 'Actions']">
            <tr class="bg-gray-50 border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">Silver</td>
                <td class="px-6 py-4">Laptop</td>
                <td class="px-6 py-4">$2999</td>
                <td class="px-6 py-4">awd</td>
                <td class="px-6 py-4 flex space-x-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                </td>
            </tr>
        </x-table>
    </div>

    <div id="modal-product"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[99] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="modal-product-label">
        <div
            class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto ">
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 ">
                    <h3 id="modal-product-label" class="font-bold text-gray-800 ">
                        Tambah Products
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none "
                        aria-label="Close" data-hs-overlay="#modal-product">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">

                    <div class="max-w-full mb-4">
                        <label for="input-label" class="block text-sm font-medium mb-2 ">
                            Product Name
                        </label>
                        <input type="text" id="input-label"
                            class="py-2.5 sm:py-3 px-4 sm:text-sm block w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Enter product name" />
                    </div>
                    <div class="max-w-full mb-4">
                        <label for="input-label" class="block text-sm font-medium mb-2 ">
                            Product Name
                        </label>
                        <input type="text" id="input-label"
                            class="py-2.5 sm:py-3 px-4 sm:text-sm block w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Enter product name" />
                    </div>

                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 ">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                            data-hs-overlay="#modal-product">
                            Close
                        </button>
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            href="#">
                            Save changes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script></script>
    @endpush
