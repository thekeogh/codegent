<?php

namespace App\Observers;

use App\Tag;

class TagObserver
{
    /**
     * Listen to the deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(Tag $tag)
    {
        $tag->articles()->detach();
    }
}