<?php 

use Illuminate\Support\Debug\Dumper;

if (! function_exists('thumb')) {
    /**
     * Convert a large/original blog article path to thumb (hacky due to old data)
     *
     * @param  string  $url
     * @return string
     */
    function thumb($url)
    {
        return str_ireplace(['/original/', '845x2000.'], ['/thumb/', '269x293_50_50.'], $url);
    }
}

if (! function_exists('cdn')) {
    /**
     * Get the CDN URL and bind the path to it
     *
     * @param  string  $path
     * @return array
     */
    function cdn($path)
    {
        return config('app.cdn_url') . $path;
    }
}

if (! function_exists('d')) {
    /**
     * Dump the passed variables but don't end the script.
     *
     * @param  mixed
     * @return void
     */
    function d(...$args)
    {
        foreach ($args as $x) {
            (new Dumper)->dump($x);
        }
    }
}