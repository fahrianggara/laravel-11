<div>
    <div class="w-full">
        <div class="flex flex-col-reverse md:flex-row md:justify-between md:items-center gap-2 mb-4">
            <input type="text" placeholder="Search..." class="border rounded-lg px-4 py-2 md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" wire:click="open" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center w-[130px] ml-auto md:ml-0">
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
</div>
