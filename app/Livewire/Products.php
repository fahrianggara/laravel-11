<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $search = '';

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
    #[On('product:success')]
    public function render()
    {
        $products = ProductModel::query()
            ->orderBy('created_at', 'desc')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })->paginate(10);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
