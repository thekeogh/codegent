<?php

namespace App\Observers;

use App\BlogCategory;

class BlogCategoryObserver
{
    /**
     * Listen to the deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(BlogCategory $category)
    {
        $category->articles()->detach();
    }
}