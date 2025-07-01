<div>
    <x-modal id="modal-product" title="Product Details">

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium mb-2 dark:text-white required">
                    Product Name
                </label>

                <div class="relative">
                    <input type="text" id="name" name="name"
                        class="py-2.5 sm:py-3 px-4 block w-full border outline-none focus:ring-2 border-red-500 rounded-lg sm:text-sm focus:border-red-500 focus:ring-red-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400" placeholder="Enter your email">

                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" x2="12" y1="8" y2="12"></line>
                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                        </svg>
                    </div>
                </div>

                <p class="text-sm text-red-600 mt-2" id="name-helper">
                    Please enter a valid email address.
                </p>
            </div>
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
