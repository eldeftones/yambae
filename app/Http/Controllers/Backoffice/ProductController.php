<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listProducts()
    {
        return view('backend.product.list');
    }


    public function newProduct()
    {
        return view('backend.product.new');
    }


    public function listProductCategories()
    {
        return view('backend.product.list-categories');
    }


    public function newSession()
    {
        return view('backend.product.new-session');
    }
}
