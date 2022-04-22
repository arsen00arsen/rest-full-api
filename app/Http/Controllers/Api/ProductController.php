<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    use ApiResponser;

    public function index(Request $request)
    {

        if ($request->get('category_id')) {
            $productCategories = ProductCategory::where('category_id', $request->input('category_id'))->pluck('product_id');

            if ($request->get('name')) {
                if ($request->get('from') && $request->get('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->orderBy('id', 'DESC')->get())]);
                }
            } else {
                if ($request->get('from') && $request->input('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->orderBy('id', 'DESC')->get())]);
                }
            }

        } elseif ($request->input('category_name')) {

            $categories = Category::where('title', 'like', "%{$request->input('category_name')}%")->pluck('id');
            $productCategories = ProductCategory::whereIn('category_id', $categories)->pluck('product_id');

            if ($request->get('name')) {
                if ($request->get('from') && $request->get('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->where('name', 'like', "%{$request->input('name')}%")->orderBy('id', 'DESC')->get())]);
                }
            } else {
                if ($request->get('from') && $request->input('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereIn('id', $productCategories)->orderBy('id', 'DESC')->get())]);
                }
            }

        } else {
            if ($request->get('name')) {
                if ($request->get('from') && $request->get('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::where('name', 'like', "%{$request->input('name')}%")->whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::where('name', 'like', "%{$request->input('name')}%")->orderBy('id', 'DESC')->get())]);
                }
            } else {
                if ($request->get('from') && $request->input('to')) {
                    if ($request->get('public') === '0' || $request->get('public') === '1') {
                        return $this->successResponse(['data' => ProductResource::collection(Product::whereBetween('price', array($request->input('from'), $request->input('to')))->where('public', $request->get('public'))->orderBy('id', 'DESC')->get())]);
                    }
                    return $this->successResponse(['data' => ProductResource::collection(Product::whereBetween('price', array($request->input('from'), $request->input('to')))->orderBy('id', 'DESC')->get())]);
                } else {
                    return $this->successResponse(['data' => ProductResource::collection(Product::orderBy('id', 'DESC')->get())]);
                }
            }
        }
    }


    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());

        $product->categories()->attach($request->category_id);
        return new ProductResource($product);
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }


    public function destroy(Product $product)
    {
        $product->categories()->detach($product->category_id);
        $product->delete();
        return 'The product was deleted';
    }
}
