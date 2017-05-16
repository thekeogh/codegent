<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as AppController;
use Illuminate\Support\Facades\DB;

class Controller extends AppController
{
    
    /**
     * Describe this resource (e.g. Article, Media etc)
     * 
     * @var string
     */
    protected $what;
    
    /**
     * The DB table to make all transactions with
     * 
     * @var string
     */
    protected $model;
    
    /**
     * Are these resource creatable?
     * 
     * @var boolean
     */
    protected $creatable = false;
    
    /**
     * Are these resource deletable?
     * 
     * @var boolean
     */
    protected $deletable = false;
    
    /**
     * Columns that are searchable by the keyword search
     * 
     * @var array
     */
    protected $searchable = [
        'id'
    ];
    
    /**
     * Fields for the listing grid
     * 
     * @var array
     */
    protected $grid;
    
    /**
     * Form fields for the create/edit form
     * 
     * @var array
     */
    protected $fields;
    
    /**
     * Initialised model
     * 
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $_model;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->admin = app()->make('App\Services\Admin\Admin');
        $this->middleware('auth');
        $this->_model = new $this->model;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.form.list', [
            'what' => $this->what,
            'grid' => $this->grid,
            'deletable' => $this->deletable,
            'creatable' => $this->creatable,
            'results' => $this->getListing(),
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form.form', [
            'type' => 'create',
            'what' => $this->what,
            'method' => 'POST',
            'action' => $this->admin->getStorePath(),
            'fields' => $this->fields
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Call the request first
        $request = app()->make($this->request);
        // Save it
        $this->_model->create($request->all());
        // Back to the index with a message
        return redirect()->to($this->admin->getIndexPath())->withSuccess("{$this->what} created successfully!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Return the listing for the grid
     * 
     * @return Collection
     */
    protected function getListing()
    {
        $query = request()->get('q');
        $listing = $this->_model;
        if ($query) {
            foreach ($this->searchable as $searchee) {
                $listing = $listing->orWhere($searchee, 'LIKE', "%{$query}%");
            }
        }
        return $listing->paginate(50);
    }
    
}
