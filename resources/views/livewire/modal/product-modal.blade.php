@php
    $action = $editing ? 'update' : 'store';
    $actionText = $editing ? 'Update Product' : 'Create Product';
    $title = $editing ? 'Edit Product' : 'Create Product';
    $required = $editing ? false : true;
    $src = (is_string($image) ? getFile($image) : $image)
        ? getFile("livewire-tmp/{$image->getFilename()}")
        : null;
@endphp

<div>
    <x-modal id="modal-product" :title="$title">
        <div class="space-y-4">
            <x-file-upload wire:model="image" accept=".jpg,.jpeg,.png"
                :src="$src" :error="$errors->first('image')" :required="$required" />

            <x-input label="Name" wire:model="name" :required="$required"
                placeholder="Enter product name" :error="$errors->first('name')" />

            <x-input label="Stock" type="number" wire:model="stock" :required="$required"
                placeholder="Enter product stocks" :error="$errors->first('stock')" />

            <x-input label="Price" type="number" wire:model="price" :required="$required"
                placeholder="Enter product prices" :error="$errors->first('price')" />

            <x-textarea label="Description" wire:model="description" :required="$required"
                placeholder="Enter product description" :error="$errors->first('description')" />
        </div>

        <x-slot name="actions">
            <x-button wire:click="{{ $action }}">
                <x-text-loading :text="$actionText" />
            </x-button>
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
