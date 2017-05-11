<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        return view('contact.index');
    }
    
}
