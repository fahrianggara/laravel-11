<?php

namespace App\Livewire\Modal;

use Livewire\Attributes\On;
use Livewire\Component;
class ProductModal extends Component
{
    /**
     * Display the modal for product creation or editing.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.modal.product-modal');
    }

    /**
     * Show the modal for creating a new product.
     *
     * @return void
     */
    #[On('product:create')]
    public function create()
    {
        $this->dispatch('modal:show');
    }

    /**
     * close
     *
     * @return void
     */
    public function close()
    {
        $this->dispatch('modal:hide');
    }
}
