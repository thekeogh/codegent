<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogArticle, App\BlogCategory;

class BlogController extends Controller
{
    
    /**
     * Construct
     */
    public function __construct()
    {
        // Add some shared data to all views
        view()->share([
            'selected_category' => null,
            'selected_tag' => null,
            'categories' => BlogCategory::orderBy('title')->limit(10)->get(),
            'latest' => BlogArticle::where('status', 'live')->where('image_url', '!=', '')->orderBy('published_at', 'desc')->limit(2)->get()
        ]);
    }
    
    /**
     * Listing page
     */
    public function index($category = null, $tag = null)
    {
        $listing = BlogArticle::with(['admin'])->where('status', 'live')->orderBy('published_at', 'desc');
        if ($category) {
            $listing->whereHas('categories', function($query) use($category) {
                return $query->where('slug', $category);
            });
        }
        if ($tag) {
            $listing->whereHas('tags', function($query) use($tag) {
                return $query->where('slug', $tag);
            });
        }
        $listing = $listing->paginate(20);
        return view('blog.index', [
            'listing' => $listing,
            'selected_category' => $category,
            'selected_tag' => $tag
        ]);
    }
    
    /**
     * Listing by category
     * 
     * @param  string $slug
     */
    public function category($slug) {
        return $this->index($slug);
    }
    
    /**
     * Listing by tag
     * 
     * @param  string $slug
     */
    public function tag($slug) {
        return $this->index(null, $slug);
    }

    /**
     * Show article
     */
    public function show($year, $day, $slug)
    {
        $article = BlogArticle::show($slug)->first();
        if (! $article) return app()->abort(404);
        return view('blog.show', compact('article'));
    }
    
    /**
     * Feed page
     */
    public function feed()
    {
        return view('blog.feed');
    }
    
}
