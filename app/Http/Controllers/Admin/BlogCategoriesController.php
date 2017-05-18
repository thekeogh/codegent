<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    
    /**
     * Describe this resource (e.g. Article, Media etc)
     * 
     * @var string
     */
    protected $what = 'Category';
    
    /**
     * The DB table to make all transactions with
     * 
     * @var string
     */
    protected $model = \App\BlogCategory::class;
    
    /**
     * The form request for the resource
     * 
     * @var string
     */
    protected $request = \App\Http\Requests\Admin\BlogCategory::class;
    
    /**
     * Are these resource creatable?
     * 
     * @var boolean
     */
    protected $creatable = true;
    
    /**
     * Are these resource deletable?
     * 
     * @var boolean
     */
    protected $deletable = true;
    
    /**
     * Columns that are searchable by the keyword search
     * 
     * @var array
     */
    protected $searchable = [
        'id',
        'title',
        'slug',
    ];
    
    /**
     * Fields for the listing grid
     * 
     * @var array
     */
    protected $grid = [
        'id' => [
            'label' => 'ID',
            'type' => 'numeric',
            'class' => 'Listing__column--center'
        ],
        'title' => [
            'label' => 'title',
            'type' => 'string',
            'main' => true
        ],
        'slug' => [
            'label' => 'Slug',
            'type' => 'string'
        ],
        'created_at' => [
            'label' => 'Created',
            'type' => 'date'
        ],
        'updated_at' => [
            'label' => 'Updated',
            'type' => 'ago'
        ]
    ];
    
    /**
     * Form fields for the create/edit form
     * 
     * @var array
     */
    protected $fields = [
        'title' => [
            'type' => 'text',
            'label' => 'Title',
            'required' => true,
            'maxlength' => 150
        ],
        'slug' => [
            'type' => 'text',
            'label' => 'Slug',
            'required' => true,
            'maxlength' => 150
        ]
    ];

    
}
