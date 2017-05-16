<?php

namespace App\Services\Admin;

use Illuminate\Support\HtmlString;

class Form extends Admin
{
    
    /**
     * Render the form field to the browser
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    public function render($name, $field, $record = null)
    {
        $type = $field['type'];
        return $this->$type($name, $field, $record);
    }
    
    //
    // Type
    // 
    
    /**
     * Return a text field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function text($name, $field, $record = null)
    {
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field">
                <input type="'. $this->type($field) .'" name="'. $name .'" id="'. $this->id($name) .'" '. $this->maxlength($field) .' value="'. $this->value($name, $record) .'" '. $this->placeholder($field) .' class="AdminForm__control AdminForm__control--input" />
            </div>'
        ));       
    }
    
    /**
     * Return a select field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function select($name, $field, $record = null)
    {
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field">
                <select name="'. $name .'" id="'. $this->id($name) .'" class="AdminForm__control AdminForm__control--select">
                    '. $this->options($name, $field, $record) .'
                </select>
            </div>'
        )); 
    }
    
    //
    // Shared
    // 
    
    /**
     * Return a label
     * 
     * @param  string $name  The name of the field
     * @param  array  $field The form field array of details
     * @return string
     */
    private function label($name, $field)
    {
        return '<label for="'. $this->id($name) .'" class="AdminForm__label">'. $field['label'] .': '. $this->required($field) .'</label>';
    }
    
    /**
     * Return the select options
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return string
     */
    private function options($name, $field, $record = null)
    {
        if (! isset($field['options'])) return '';
        $options = '<option value="">'. array_get($field, 'placeholder', 'Please Select...') .'</option>';
        foreach ($field['options'] as $value => $label) {
            $options .= '<option value="'. $value .'" '. $this->selected($name, $value, $record) .'>'. $label .'</option>';
        };
        return $options;
    }
    
    /**
     * Return the value for a input
     * 
     * @param  string                               $name   The name of the field
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return string
     */
    private function value($name, $record = null)
    {
        return old($name, $record ? $record->$name : null);
    }
    
    /**
     * Return a selected value for selects if the value matches
     * 
     * @param  string                               $name   The name of the field
     * @param  string                               $value  The value of the option
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return string
     */
    private function selected($name, $value, $record = null)
    {
        if (($record and $value == $record->$name) or old($name) == $value) {
            return 'selected="selected"';
        }
    }
    
    /**
     * Return the ID of a field
     * 
     * @param  string $name  The name of the field
     * @return string
     */
    private function id($name)
    {
        return "_{$name}";
    }
    
    /**
     * Return the type attr of a input
     * 
     * @param  array  $field The form field array of details
     * @return string
     */
    private function type($field)
    {
        return array_get($field, 'type', 'text');
    }
    
    /**
     * Return the maxlength of a field
     * 
     * @param  array  $field The form field array of details
     * @return string
     */
    private function maxlength($field)
    {
        return (isset($field['maxlength']) and ($field['maxlength'])) ? 'maxlength="'. $field['maxlength'] .'"' : null;
    }
    
    /**
     * Return the placeholder of a field
     * 
     * @param  array  $field The form field array of details
     * @return string
     */
    private function placeholder($field)
    {
        return (isset($field['placeholder']) and ($field['placeholder'])) ? 'placeholder="'. $field['placeholder'] .'"' : null;
    }
    
    /**
     * Return the if the field is required
     * 
     * @param  array  $field The form field array of details
     * @return string
     */
    private function required($field)
    {
        return (isset($field['required']) and $field['required']) ? ' *' : null;
    }
    
    /**
     * Wrap the field in the HTML for rendering
     * 
     * @param string $content The content to be wrapped
     * @return string
     */
    private function wrapper($content)
    {
        return '<div class="AdminForm__row">'. $content .'</div>';
    }
    
}
