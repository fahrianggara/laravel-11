<?php

namespace App\Livewire\Modal;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProductModal extends Component
{
    use WithFileUploads;

    public $editing = false;
    public $product_id;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $stock;
    public $image;
    public $oldImage; // For delete on change image

    /**
     * Mount the component with optional product data.
     *
     * @return void
     */

    public function updatedImage()
    {
        // remove old image previously uploaded
        if ($this->oldImage && $this->oldImage instanceof TemporaryUploadedFile) {
            deleteFile("livewire-tmp/{$this->oldImage->getFilename()}");
        }

        $this->oldImage = $this->image;
    }

    /**
     * Rules for product validation.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name'        => 'required|string|max:100|unique:products,name,' . $this->product_id,
            'description' => 'required|string|max:500|min:10',
            'price'       => 'required|numeric|min:0|max:999999.99',
            'stock'       => 'required|integer|min:0|max:999999',
            'image'       => $this->editing && is_string($this->image)
                ? 'nullable' : 'required|image|max:5120|mimes:jpeg,png,jpg',
        ];
    }

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
     * Store the product data.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
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
        // Hapus file temporary saat ini jika ada
        if ($this->image instanceof TemporaryUploadedFile) {
            deleteFile("livewire-tmp/{$this->image->getFilename()}");
        }

        $this->reset([
            'editing',
            'product_id',
            'name',
            'slug',
            'description',
            'price',
            'stock',
            'image',
            'oldImage',
        ]);

        $this->resetErrorBag();
        $this->dispatch('modal:hide');
    }
}
