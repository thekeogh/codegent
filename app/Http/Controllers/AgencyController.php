<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        return view('agency.index');
    }
    
}
