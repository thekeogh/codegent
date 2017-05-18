<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as AppController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
     * The form request for the resource
     * 
     * @var string
     */
    protected $request;
    
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
            'fields' => $this->fields,
            'record' => null
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
        $params = $request->all();
        $this->dates($params);
        $record = $this->_model->create($params);
        $this->multi($record);
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
        $record = $this->getRecord($id);
        // Need the record to go any further
        if (! $record) return redirect()->to($this->admin->getIndexPath())->withError('Sorry, this '. strtolower($this->what) .' doesn\'t exist!');
        // We may continue
        return view('admin.form.form', [
            'type' => 'edit',
            'what' => $this->what,
            'method' => 'PUT',
            'action' => $this->admin->getUpdatePath(['id' => $id]),
            'fields' => $this->fields,
            'record' => $record
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Call the request first
        $request = app()->make($this->request);
        // Save it
        $record = $this->getRecord($id);
        $params = $request->all();
        $this->dates($params);
        $record->fill($params);
        $record->save();
        $this->multi($record);
        // Back to the index with a message
        return redirect()->to($this->admin->getIndexPath())->withSuccess("{$this->what} updated successfully!");
    }

    /**
     * Looks at the request and add many to many relations if they exist
     * 
     * @param  Illuminate\Database\Eloquent\Model $record
     * @return void
     */
    private function multi($record)
    {
        foreach (request()->all() as $name => $value) {
            if (is_array($value)) {
                $record->$name()->sync($value);
            }
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->_model->find($id);
        if (! $record) return redirect()->to($this->admin->getIndexPath())->withError("Couldn't find a {$this->what} with that ID, please try again!");
        $record->delete();
        // Back to the index with a message
        return redirect()->to($this->admin->getIndexPath())->withSuccess("{$this->what} deleted successfully!");
    }
    
    /**
     * for store and update, check for date fields and add to the request
     * 
     * @param  array &$params The request we want to add to
     * @return void
     */
    private function dates(&$params)
    {
        $dates = [];
        // loop the params and extract the date values
        foreach ($params as $name => $value) {
            if (str_contains($name, '_dt_')) {
                $exp = explode('_dt_', $name);
                $dates[$exp[0]][$exp[1]] = $value;
            }
        }
        // no dates? That's fine, leave
        if (! $dates) return;
        // we got dates, loop and carbonise
        foreach ($dates as $name => $parts) {
            $params[$name] = new Carbon("{$parts['year']}-{$parts['month']}-{$parts['day']} {$parts['hour']}:{$parts['minute']}");
        }
    }
    
    /**
     * Return the listing for the grid
     * 
     * @return Collection
     */
    protected function getListing()
    {
        $query = request()->get('q');
        $listing = $this->_model->cms();
        if ($query) {
            foreach ($this->searchable as $searchee) {
                $listing = $listing->orWhere($searchee, 'LIKE', "%{$query}%");
            }
        }
        return $listing->paginate(50);
    }
    
    /**
     * Get the record for editing
     * 
     * @param  integer $id The ID we want
     * @return Illuminate\Database\Eloquent\Model
     */
    protected function getRecord($id)
    {
        return $this->_model->find($id);
    }
    
}
