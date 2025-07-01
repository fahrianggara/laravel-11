<div id="{{ $id }}"
    class="hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto bg-black/40 transition-opacity"
    role="dialog" tabindex="-1" aria-labelledby="{{ $id }}-label" wire:ignore.self>

    <div class="{{ $size }} m-3 min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            @if($showHeader)
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="{{ $id }}-label" class="font-bold text-gray-800 dark:text-white">
                        {{ $title }}
                    </h3>
                </div>
            @endif

            <div class="p-4 overflow-y-auto max-h-[50vh] text-gray-800 dark:text-neutral-400">
                {{ $slot }}
            </div>

            <div class="flex justify-end gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                <div wire:loading>
                    <x-button class="border border-gray-200 bg-white hover:bg-gray-50">
                        <x-text-loading text="Loading" iconColor="text-[#000]" class="text-[#000]" />
                    </x-button>
                </div>

                <div wire:loading.remove>
                    <x-button wire:click="{{ $closeEvent }}" class="border border-gray-200 bg-white hover:bg-gray-50">
                        <x-text-loading :text="$closeText" iconColor="text-[#000]" class="text-[#000]" />
                    </x-button>
                </div>

                @isset($actions)
                    {{ $actions }}
                @endisset
            </div>
        </div>
    </div>
</div>
