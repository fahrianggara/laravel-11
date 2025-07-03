<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
    ];

    /**
     * Get the image URL for the product.
     *
     * @return void
     */
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset("storage/{$this->image}")
            : asset('storage/default.png');
    }
}
