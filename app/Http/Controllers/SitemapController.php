<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        $blogcats = \App\BlogCategory::get();
        $blogtags = \App\Tag::get();
        $blogarticles = \App\BlogArticle::where('status', 'live')->orderBy('published_at', 'desc')->get();
        return response(view('sitemap.index', compact('blogcats', 'blogtags', 'blogarticles')), 200)->header('Content-Type', 'text/xml');
    }
    
}
