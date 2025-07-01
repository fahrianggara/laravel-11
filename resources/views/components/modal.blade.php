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
                    <button type="button" wire:click="{{ $closeEvent }}"
                        class="size-8 inline-flex justify-center items-center rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="p-4 overflow-y-auto max-h-[50vh] text-gray-800 dark:text-neutral-400">
                {{ $slot }}
            </div>

            <div class="flex justify-end gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                <button type="button" wire:click="{{ $closeEvent }}"
                    class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700">

                    <x-text-loading :text="$closeText" color="text-[#000]" />
                </button>

                @isset($extendedAction)
                    {{ $extendedAction }}
                @endisset
            </div>
        </div>
    </div>
</div>
