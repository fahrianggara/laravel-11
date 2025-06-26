<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    /**
     * Update the product
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedProductName($value)
    {
        $this->product['slug'] = Str::slug($value);
    }

    /**
     * Render the component view
     *
     * @return void
     */
    #[Title('Products')]
    public function render()
    {
        $products = ProductModel::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.products');
    }
}
