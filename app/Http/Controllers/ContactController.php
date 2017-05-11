<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    
    /**
     * Landing page
     */
    public function index()
    {
        return view('contact.index');
    }
    
    /**
     * Posting the form
     */
    public function contacting()
    {
        Mail::send(new Contact('Bob', 'bob@bob.com', 'type', 'my message'));
    }
    
}
