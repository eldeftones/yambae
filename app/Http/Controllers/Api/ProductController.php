<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewProductRequest;
use App\Models\Product;

class ProductController extends Controller {


    public function getProducts()
    {
        $products = Product::all();

        return response()->json($products->map->toJson());
    }


    public function createProduct(CreateNewProductRequest $request)
    {
        $product = new Product;
        $product->fromJson(request()->all());
        $product->save();

        return response()->json(['message' => 'Nouveau produit créé !']);
    }

}
