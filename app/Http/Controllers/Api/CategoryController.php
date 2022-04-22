<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        return CategoryResource::collection(Category::all());
    }


    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->validated());

        $category->products()->attach($request->product_id);
        return new CategoryResource($category);
    }


    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $hasProducts = ProductCategory::where('category_id',$category->id)->get();
        if ($hasProducts) {
            return 'Category has product';
        } else {
            $category->delete();
            return 'Category was deleted';
        }
    }
}
