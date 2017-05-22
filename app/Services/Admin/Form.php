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
                <input
                    type="'. $this->type($field) .'"
                    name="'. $name .'"
                    id="'. $this->id($name) .'"
                    '. $this->maxlength($field) .'
                    value="'. $this->value($name, $record) .'"
                    '. $this->placeholder($field) .'
                    class="AdminForm__control AdminForm__control--input"
                >
            </div>'
        ));       
    }
    
    /**
     * Return a textarea field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function textarea($name, $field, $record = null)
    {
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field">
                <textarea
                    name="'. $name .'"
                    id="'. $this->id($name) .'"
                    rows="'. $this->rows($field) .'"
                    '. $this->maxlength($field) .'
                    '. $this->placeholder($field) .'
                    class="AdminForm__control AdminForm__control--textarea"
                >'. $this->value($name, $record) .'</textarea>
            </div>'
        , 'AdminForm__row--top'));       
    }
    
    /**
     * Return a textarea field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function markdown($name, $field, $record = null)
    {
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field">
                <textarea
                    name="'. $name .'"
                    id="'. $this->id($name) .'"
                    rows="'. $this->rows($field, 20) .'"
                    '. $this->maxlength($field) .'
                    '. $this->placeholder($field) .'
                    class="AdminForm__control AdminForm__control--textarea Markdown"
                >'. $this->value($name, $record) .'</textarea>
            </div>'
        , 'AdminForm__row--top'));       
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
    
    /**
     * Return a multi select field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function multiselect($name, $field, $record = null)
    {
        $model = new $field['options'];
        $options = '';
        foreach ($model->all()->pluck('title', 'id') as $id => $title) {
            $selected = '';
            if (old($name) and in_array($id, old($name))) {
                $selected = 'selected';
            } else if ($record) {
                $current = $record->$name->pluck('id', 'id')->toArray();
                if (in_array($id, $current)) {
                    $selected = 'selected';
                }
            }
            $options .= '<option value="'. $id .'" '. $selected .'>'. $title .'</option>';
        }
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field">
                <select name="'. $name .'[]" id="'. $this->id($name) .'" class="chosen-select AdminForm__control AdminForm__control--select" multiple="6">
                    '. $options .'
                </select>
            </div>'
        )); 
    }
    
    /**
     * Return an image upload field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function image($name, $field, $record = null)
    {
        $html = $this->wrapper($this->label($name, $field) . '
            <div class="AdminForm__field">
                <input
                    type="file"
                    name="'. $name .'"
                    id="'. $this->id($name) .'"
                    class="AdminForm__control AdminForm__control--file"
                >
            </div>
        ');
        if ($record and $record->$name) {
            $html .= $this->wrapper('<label class="AdminForm__label">Current image</label>
                <div class="AdminForm__field">
                    <div class="AdminImage">
                        <input type="hidden" class="AdminImage__removefield" name="removeimage_'. $name .'" value="0">
                        <a href="#" class="AdminImage__remove" title="Remove image"><i class="material-icons">close</i></a>
                        <img src="'. $record->$name .'" width="200">
                    </div>
                </div>'
            , 'AdminForm__row--top');
        }
        return new HtmlString($html);         
    }
    
    /**
     * Return a date and time field
     * 
     * @param  string                               $name   The name of the field
     * @param  array                                $field  The form field array of details
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @return HtmlString
     */
    private function datetime($name, $field, $record = null)
    {
        return new HtmlString($this->wrapper(
            $this->label($name, $field) . '
            <div class="AdminForm__field AdminForm__field--date">
                <select name="'. $name .'_dt_day" id="'. $this->id($name . '_day') .'" class="AdminForm__control AdminForm__control--select AdminForm__control--day AdminForm__control--space">
                    '. $this->_days($name .'_dt_day', $record) .'
                </select>
                <select name="'. $name .'_dt_month" id="'. $this->id($name . '_month') .'" class="AdminForm__control AdminForm__control--select AdminForm__control--month AdminForm__control--space">
                    <option value="">Month</option>
                    <option value="01" '. $this->selectedDatePart($name .'_dt_month', '01', $record, 'm') .'>January</option>
                    <option value="02" '. $this->selectedDatePart($name .'_dt_month', '02', $record, 'm') .'>February</option>
                    <option value="03" '. $this->selectedDatePart($name .'_dt_month', '03', $record, 'm') .'>March</option>
                    <option value="04" '. $this->selectedDatePart($name .'_dt_month', '04', $record, 'm') .'>April</option>
                    <option value="05" '. $this->selectedDatePart($name .'_dt_month', '05', $record, 'm') .'>May</option>
                    <option value="06" '. $this->selectedDatePart($name .'_dt_month', '06', $record, 'm') .'>June</option>
                    <option value="07" '. $this->selectedDatePart($name .'_dt_month', '07', $record, 'm') .'>July</option>
                    <option value="08" '. $this->selectedDatePart($name .'_dt_month', '08', $record, 'm') .'>August</option>
                    <option value="09" '. $this->selectedDatePart($name .'_dt_month', '09', $record, 'm') .'>September</option>
                    <option value="10" '. $this->selectedDatePart($name .'_dt_month', '10', $record, 'm') .'>October</option>
                    <option value="11" '. $this->selectedDatePart($name .'_dt_month', '11', $record, 'm') .'>November</option>
                    <option value="12" '. $this->selectedDatePart($name .'_dt_month', '12', $record, 'm') .'>December</option>
                </select>
                <select name="'. $name .'_dt_year" id="'. $this->id($name . '_year') .'" class="AdminForm__control AdminForm__control--select AdminForm__control--year AdminForm__control--space">
                    '. $this->_years($name .'_dt_year', $record) .'
                </select>
                <select name="'. $name .'_dt_hour" id="'. $this->id($name . '_hour') .'" class="AdminForm__control AdminForm__control--select AdminForm__control--hour AdminForm__control--doublespace">
                    '. $this->_hours($name .'_dt_hour', $record) .'
                </select>
                :
                <select name="'. $name .'_dt_minute" id="'. $this->id($name . '_minute') .'" class="AdminForm__control AdminForm__control--select AdminForm__control--minute AdminForm__control--space">
                    '. $this->_minutes($name .'_dt_minute', $record) .'
                </select>
            </div>'
        )); 
    }
    
    /**
     * Return days 1 - 31 for a select
     * 
     * @return string
     */
    private function _days($name, $record = null)
    {
        $html = '<option value="">Day</option>';
        for ($i = 1; $i <= 31; $i++) {
            $html .= '<option value="'. sprintf("%02d", $i) .'" '. $this->selectedDatePart($name, sprintf("%02d", $i), $record, 'd') .'>'. $i .'</option>';
        }
        return $html;
    }
    
    /**
     * Return years for a select
     * 
     * @return string
     */
    private function _years($name, $record = null)
    {
        $html = '<option value="">Year</option>';
        for ($i = date('Y')-20; $i <= date('Y')+5; $i++) {
            $html .= '<option value="'. $i .'" '. $this->selectedDatePart($name, $i, $record, 'Y') .'>'. $i .'</option>';
        }
        return $html;        
    }
    
    /**
     * Return hours 00 - 24 for a select
     * 
     * @return string
     */
    private function _hours($name, $record = null)
    {
        $html = '<option value="">Hour</option>';
        for ($i = 0; $i <= 23; $i++) {
            $html .= '<option value="'. sprintf("%02d", $i) .'" '. $this->selectedDatePart($name, sprintf("%02d", $i), $record, 'H') .'>'. sprintf("%02d", $i) .'</option>';
        }
        return $html;
    }
    
    /**
     * Return minutes for a select
     * 
     * @return string
     */
    private function _minutes($name, $record = null)
    {
        $html = '<option value="">Min</option>';
        for ($i = 0; $i <= 55; $i+=5) {
            $html .= '<option value="'. sprintf("%02d", $i) .'" '. $this->selectedDatePart($name, sprintf("%02d", $i), $record, 'i') .'>'. sprintf("%02d", $i) .'</option>';
        }
        return $html;
    }
    
    //
    // Shared
    // 
    
    /**
     * Return the rows value for a textarea
     * 
     * @param  array  $field The form field array of details
     * @return string
     */
    private function rows($field, $default = 6)
    {
        return array_get($field, 'rows', $default);
    }
    
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
        if (($record and $value == $record->$name) or (old($name) == $value)) {
            return 'selected="selected"';
        }
    }
    
    /**
     * Return a selected value for selects if the value matches, only for date parts
     * 
     * @param  string                               $name   The name of the field
     * @param  string                               $value  The value of the option
     * @param  Illuminate\Database\Eloquent\Model   $record The record (if we are editing)
     * @param  string                               $part   The ->format() part to look at
     * @return string
     */
    private function selectedDatePart($name, $value, $record = null, $part)
    {
        if ($record) {
            $realname = explode('_dt_', $name)[0];
            if ($value == $record->$realname->format($part)) return 'selected="selected"';
        } else if (old($name) == $value) {
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
     * @param string $class   Any additional classes to add to the wrapper
     * @return string
     */
    private function wrapper($content, $class = null)
    {
        return '<div class="AdminForm__row '. $class .'">'. $content .'</div>';
    }
    
}
