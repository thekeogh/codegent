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
            'what' => $this->what
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
