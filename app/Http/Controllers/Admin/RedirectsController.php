<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class RedirectsController extends Controller
{
    
    /**
     * Describe this resource (e.g. Article, Media etc)
     * 
     * @var string
     */
    protected $what = 'Redirect';
    
    /**
     * The DB table to make all transactions with
     * 
     * @var string
     */
    protected $model = \App\Redirect::class;
    
    protected $request = \App\Http\Requests\Admin\Redirect::class;
    
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
        'status',
        'from',
        'to'
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
        'from' => [
            'label' => 'From',
            'type' => 'string',
            'main' => true
        ],
        'to' => [
            'label' => 'To',
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
        'from' => [
            'type' => 'text',
            'label' => 'From URL',
            'required' => true,
            'placeholder' => '/path/to/old/url',
            'maxlength' => 255
        ],
        'to' => [
            'type' => 'text',
            'label' => 'To URL',
            'required' => true,
            'placeholder' => '/path/to/new/url',
            'maxlength' => 255
        ],
        'status' => [
            'type' => 'select',
            'options' => [
                'active' => 'Active',
                'disabled' => 'Disabled'
            ],
            'label' => 'Status',
            'required' => true
        ]
    ];

    
}
