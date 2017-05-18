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
     * The scope for the CMS grid
     */
    public function scopeCms($query)
    {
        return $query;
    }
    
}
