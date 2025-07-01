<div>
    <x-modal id="modal-product" title="Product Details">

        Hello World!!

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
