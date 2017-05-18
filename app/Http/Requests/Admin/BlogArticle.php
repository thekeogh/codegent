<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required',
            'title' => 'required|max:150',
            'slug' => 'required|max:150',
            'categories' => 'required',
            'summary' => 'max:2000',
            'body' => 'required',
            'youtube_id' => 'max:30',
            'published_at_dt_day' => 'required',
            'published_at_dt_month' => 'required',
            'published_at_dt_year' => 'required',
            'published_at_dt_hour' => 'required',
            'published_at_dt_minute' => 'required',
        ];
    }
    
    /**
     * Get the atribute display values for the request
     * 
     * @return array
     */
    public function attributes()
    {
        return [
            'published_at_dt_day' => 'published day',
            'published_at_dt_month' => 'published month',
            'published_at_dt_year' => 'published year',
            'published_at_dt_hour' => 'published hour',
            'published_at_dt_minute' => 'published minute',
        ];
    }
    
}
