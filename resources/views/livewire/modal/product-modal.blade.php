<div>
    <x-modal id="modal-product" title="Create Product">
        <div class="space-y-4">
            <x-file-upload wire:model="product.image" accept=".jpg,.jpeg,.png"
                :error="$errors->first('product.image')" :required="true" />

            <x-input label="Name" wire:model="product.name" :required="true"
                placeholder="Enter product name" :error="$errors->first('product.name')" />

            <x-input label="Stock" type="number" wire:model="product.stock" :required="true"
                placeholder="Enter product stocks" :error="$errors->first('product.stock')" />

            <x-input label="Price" type="number" wire:model="product.price" :required="true"
                placeholder="Enter product prices" :error="$errors->first('product.price')" />

            <x-textarea label="Description" wire:model="product.description" :required="true"
                placeholder="Enter product description" :error="$errors->first('product.description')" />
        </div>

        <x-slot name="actions">
            <x-button wire:click="submit">Save changes</x-button>
        </x-slot>
    </x-modal>

    @script
        <script>
            const modal = document.getElementById('modal-product');
            const modalEvent = new Modal(modal, {
                keyboard: false,
            });

            Livewire.on('modal:show', () => { modalEvent.show() });
            Livewire.on('modal:hide', () => { modalEvent.hide() });
        </script>
    @endscript
</div>
