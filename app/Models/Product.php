<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $fillable = ['name', 'price', 'public'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
