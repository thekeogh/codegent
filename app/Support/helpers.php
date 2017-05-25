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

if (! function_exists('str_replace_first')) {
    /**
     * Replace first occurance of a string
     * 
     * @param  string $from
     * @param  string $to
     * @param  string $subject
     * @return string
     */
    function str_replace_first($from, $to, $subject)
    {
        $from = '/'.preg_quote($from, '/').'/';
        return preg_replace($from, $to, $subject, 1);
    }
}

if (! function_exists('str_replace_last')) {
    /**
     * Replace last occurance of a string
     * 
     * @param  string $from
     * @param  string $to
     * @param  string $subject
     * @return string
     */
    function str_replace_last($from, $to, $subject)
    {
        $pos = strrpos($subject, $from);
        if ($pos !== false) { $subject = substr_replace($subject, $to, $pos, strlen($from)); }
        return $subject;
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