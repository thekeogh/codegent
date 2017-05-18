<?php

namespace App\Observers;

use App\BlogArticle;

class BlogArticleObserver
{
    /**
     * Listen to the deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(BlogArticle $article)
    {
        $article->categories()->detach();
    }
}