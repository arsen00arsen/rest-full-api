<?php

namespace App\Http\Resources;

use App\Models\ProductCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        $productCategory = ProductCategory::where('category_id',$this->id)->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'product_id'=>$productCategory->map(function ($item){
                return $item->product_id;
            })
            ];
    }
}
