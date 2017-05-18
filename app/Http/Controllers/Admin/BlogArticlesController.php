<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class BlogArticlesController extends Controller
{
    
    /**
     * Describe this resource (e.g. Article, Media etc)
     * 
     * @var string
     */
    protected $what = 'Article';
    
    /**
     * The DB table to make all transactions with
     * 
     * @var string
     */
    protected $model = \App\BlogArticle::class;
    
    /**
     * The form request for the resource
     * 
     * @var string
     */
    protected $request = \App\Http\Requests\Admin\BlogArticle::class;
    
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
     * Does the resource have file uploads?
     * 
     * @var boolean
     */
    protected $uploads = true;
    
    /**
     * Columns that are searchable by the keyword search
     * 
     * @var array
     */
    protected $searchable = [
        'id',
        'title',
        'slug'
    ];
    
    /**
     * Fields for the listing grid
     * 
     * @var array
     */
    protected $grid = [
        'status' => [
            'label' => null,
            'type' => 'status',
            'class' => 'Listing__column--center'
        ],
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
        'published_at' => [
            'label' => 'Published',
            'type' => 'date'
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
        ],
        'categories' => [
            'type' => 'multiselect',
            'label' => 'Categories',
            'options' => \App\BlogCategory::class,
            'required' => true
        ],
        [],
        'summary' => [
            'type' => 'textarea',
            'label' => 'Summary',
            'maxlength' => 2000
        ],
        'body' => [
            'type' => 'markdown',
            'label' => 'Body',
            'required' => true,
        ],
        [],
        'image_url' => [
            'type' => 'image',
            'label' => 'Image'
        ],
        'youtube_id' => [
            'type' => 'text',
            'label' => 'YouTube video ID',
            'maxlength' => 30,
            'placeholder' => 'F0K_YnMUPxU'
        ],
        [],
        'published_at' => [
            'type' => 'datetime',
            'label' => 'Published date',
            'required' => true,
        ],
        'status' => [
            'type' => 'select',
            'options' => [
                'live' => 'Live',
                'pending' => 'Pending',
                'archived' => 'Archived'
            ],
            'label' => 'Status',
            'required' => true
        ]
    ];

    
}
