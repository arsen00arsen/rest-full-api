<?php

namespace App\Http\Resources;

use App\Models\ProductCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {

        $productCategory = ProductCategory::where('product_id', $this->id)->get();


        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'public' => $this->public,
            'category_id' => $productCategory->map(function ($item) {
                return $item->category_id;
            })
        ];
    }
}
