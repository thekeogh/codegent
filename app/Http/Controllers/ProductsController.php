<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        return view('products.index');
    }
    
}
