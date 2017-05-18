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
    protected $table = 'blog_articles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'title', 'slug', 'summary', 'body', 'image_url', 'youtube_url', 'published_at'];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The scope for the CMS grid
     */
    public function scopeCms($query)
    {
        return $query;
    }
    
}
