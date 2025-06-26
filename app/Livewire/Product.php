<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Str;

class Product extends Component
{
    public $openModal = false;
    public $product = [
        'name' => '',
        'slug' => '',
        'description' => null,
        'price' => 0,
        'stock' => 0,
        'image' => 'image.png',
    ];
    public $products = [];
    public $actionType = 'create';

    protected $rules = [
        'product.name' => 'required|string|max:255',
        'product.slug' => 'requiredunique:products,slug',
        'product.description' => 'nullable|string',
        'product.price' => 'required|numeric|min:0',
        'product.stock' => 'required|integer|min:0',
    ];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->products = ProductModel::query()->get();
    }

    /**
     * updatedProductName
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedProductName($value)
    {
        $this->product['slug'] = Str::slug($value);
    }

    /**
     * openModal
     *
     * @return void
     */
    public function open()
    {
        dd('openModal');
    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->openModal = false;
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.product');
    }
}
