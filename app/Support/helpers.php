<?php 

use Illuminate\Support\Debug\Dumper;

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