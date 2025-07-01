<div>
    <x-modal id="modal-product" title="Create Product">

        <div class="space-y-4">
            <x-input label="Name" wire:model="product.name" :required="true"
                placeholder="Enter product name" :error="$errors->first('product.name')" />

            <x-input label="Stock" type="number" wire:model="product.stock" :required="true"
                placeholder="Enter product stocks" :error="$errors->first('product.stock')" />

            <x-input label="Price" type="number" wire:model="product.price" :required="true"
                placeholder="Enter product prices" :error="$errors->first('product.price')" />
        </div>

        <x-slot name="extendedAction">
            <button type="button" wire:click="submit"
                class="py-2 px-3 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                Save changes
            </button>
        </x-slot>
    </x-modal>

    @script
        <script>
            const modal = document.getElementById('modal-product');
            const modalEvent = new Modal(modal, {
                keyboard: false,
            });

            Livewire.on('modal:show', () => {
                modalEvent.show();
            });

            Livewire.on('modal:hide', () => {
                modalEvent.hide();
            });
        </script>
    @endscript
</div>
