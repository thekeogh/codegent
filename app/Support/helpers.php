<?php 

if (! function_exists('cdn')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function cdn($path)
    {
        return config('app.cdn_url') . $path;
    }
}