<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    /**
     * Listing page
     */
    public function index()
    {
        return view('blog.index');
    }
    
}
