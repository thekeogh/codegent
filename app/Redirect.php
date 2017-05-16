<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'redirects';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'from', 'to'];
    
}
