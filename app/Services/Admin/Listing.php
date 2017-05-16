<?php

namespace App\Services\Admin;

use Illuminate\Support\HtmlString;

class Listing extends Admin
{
    
    /**
     * Render the listing type out to the browser
     * 
     * @param  string                               $idx        The index of the $grid value (this will be the DB column name)
     * @param  array                                $field      The field array
     * @param  Illuminate\Database\Eloquent\Model   $result     The result for the output
     * @return string
     */
    public function render($idx, $field, $result)
    {
        $type = $field['type'];
        $output = $result->$idx;
        return $this->$type($output);
    }
    
    /**
     * Return a status output
     * 
     * @param  string $output The output value from this record
     * @return string
     */
    private function status($output)
    {
        return new HtmlString('<i class="material-icons Status Status--'. $output .'">check_circle</i>');
    }
    
    /**
     * Return a numeric output
     * 
     * @param  string $output The output value from this record
     * @return string
     */
    private function numeric($output)
    {
        return new HtmlString('<code class="Code">'. $output .'</code>');
    }
    
    /**
     * Return a string output
     * 
     * @param  string $output The output value from this record
     * @return string
     */
    private function string($output)
    {
        return $output;
    }
    
    /**
     * Return a date output
     * 
     * @param  Carbon\Carbon $output The output value from this record
     * @return string
     */
    private function date($output)
    {
        return $output->format('j M Y H:i');
    }
    
    /**
     * Return a diffForHumans output
     * 
     * @param  Carbon\Carbon $output The output value from this record
     * @return string
     */
    private function ago($output)
    {
        return $output->diffForHumans();
    }
    
}
