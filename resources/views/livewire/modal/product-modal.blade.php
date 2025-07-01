<div>
    <div id="modal-product" class="hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto bg-black/40 transition-opacity"
        role="dialog" tabindex="-1" aria-labelledby="modal-product-label" wire:ignore.self>

        <div class="sm:max-w-2xl sm:w-full m-3 sm:mx-auto mt-24 ">
            <div
                class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div
                    class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="modal-product-label" class="font-bold text-gray-800 dark:text-white">
                        Modal title
                    </h3>
                    <button type="button" wire:click="close"
                        class="size-8 inline-flex justify-center items-center rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400"
                        aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            viewBox="0 0 24 24">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto max-h-[50vh] text-gray-800 dark:text-neutral-400">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                Motivate teams to do their best work. Offer best practices to get users going in the
                                right direction. Be bold and offer just enough help to get the work started, and then
                                get out of the way. Give accurate information so users can make educated decisions. Know
                                your user's struggles and desired outcomes and give just enough information to let them
                                get where they need to go.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                Focusing on the details gives people confidence in our products. Weave a consistent
                                story across our fabric and be diligent about vocabulary across all messaging by being
                                brand conscious across products to create a seamless flow across all the things. Let
                                people know that they can jump in and start working expecting to find a dependable
                                experience across all the things. Keep teams in the loop about what is happening by
                                informing them of relevant features, products and opportunities for success. Be on the
                                journey with them and highlight the key points that will help them the most - right now.
                                Be in the moment by focusing attention on the important bits first.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink
                            </h3>
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                Keep our own story short and give teams just enough to get moving. Get to the point and
                                be direct. Be concise - we tell the story of how we can help, but we do it directly and
                                with purpose. Be on the lookout for opportunities and be quick to offer a helping hand.
                                At the same time realize that nobody likes a nosy neighbor. Give the user just enough to
                                know that something awesome is around the corner and then get out of the way. Write
                                clear, accurate, and concise text that makes interfaces more usable and consistent - and
                                builds trust. We strive to write text that is understandable by anyone, anywhere,
                                regardless of their culture or language so that everyone feels they are part of the
                                team.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                    <button type="button" wire:click="close"
                        class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700">
                        Close
                    </button>
                    <button type="button"
                        class="py-2 px-3 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            const modal = document.getElementById('modal-product');
            const modalEvent = new Modal(modal, {
                keyboard: false
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
