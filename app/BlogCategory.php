<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug'];
    
    
    /**
     * The articles that belong to the category.
     */
    public function articles()
    {
        return $this->belongsToMany('App\BlogArticle', 'blog_category_article', 'category_id', 'article_id');
    }
    
    /**
     * The scope for the CMS grid
     */
    public function scopeCms($query)
    {
        return $query;
    }
    
}
