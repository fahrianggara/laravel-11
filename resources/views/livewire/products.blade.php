<div>
    <div class="w-full">
        <div class="flex flex-col-reverse md:flex-row md:justify-between md:items-center gap-2 mb-4">
            <input type="text" placeholder="Search..." wire:model.live.debounce.500ms="search"
                class="border rounded-lg px-4 py-2 md:w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-product"
                wire:click="$dispatch('product:create')"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-center w-[130px] ml-auto md:ml-0
                hover:bg-blue-700">
                Add Product
            </button>
        </div>

        <x-table headers="Product name, Description, Stock, Price, Image, Actions">
            @forelse ($products as $product)
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->stock }}
                    </td>
                    <td class="px-6 py-4">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-[100px] object-contain">
                    </td>
                    <td class="px-6 py-4 flex space-x-4 my-auto h-auto">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Hmm.. No products found.
                    </td>
                </tr>
            @endforelse
        </x-table>
    </div>

    @livewire('modal.product-modal')
</div>
