<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug'];
    
    
    /**
     * The articles that belong to the tag.
     */
    public function articles()
    {
        return $this->belongsToMany('App\BlogArticle', 'tag_blog_article', 'tag_id', 'article_id');
    }
    
    /**
     * The scope for the CMS grid
     */
    public function scopeCms($query)
    {
        return $query;
    }
    
}
