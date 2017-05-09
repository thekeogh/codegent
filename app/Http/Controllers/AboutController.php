<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        return view('about.index');
    }
    
}
