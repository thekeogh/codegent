<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogArticle;

class BlogController extends Controller
{
    
    /**
     * Listing page
     */
    public function index()
    {
        return view('blog.index');
    }

    /**
     * Show article
     */
    public function show($year, $day, $slug)
    {
        // DO CHECKS AND SHIT
        $article = BlogArticle::show($slug)->first();
        return view('blog.show', compact('article'));
    }
    
}
