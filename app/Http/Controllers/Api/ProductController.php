<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateNewProductRequest;
use App\Models\Category;
use App\Models\Level;
use App\Models\Product;
use App\Models\Session;

class ProductController extends Controller {


    public function getProducts()
    {
        $products = Product::all();

        return response()->json($products->map->toJson());
    }


    public function getSessions()
    {
        $sessions = Session::all();

        return response()->json($sessions->map->toJson());
    }


    public function getLevels()
    {
        $levels = Level::all();

        return response()->json($levels->map->toJson());
    }


    public function createProduct(CreateNewProductRequest $request)
    {
        $product = new Product;
        $product->fromJson(request()->all());
        $product->save();

        return response()->json(['message' => 'Nouveau produit créé !']);
    }


    public function listProductCategories()
    {
        return response()->json(Category::all());
    }

}
