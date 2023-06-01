<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    use HasFactory;

    protected $table = 'addproducts';

    protected $fillable = ['name', 'description', 'price'];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Custom methods
    public function calculateDiscountedPrice($discountPercentage)
    {
        $discount = $this->price * ($discountPercentage / 100);
        return $this->price - $discount;
    }
    
}

