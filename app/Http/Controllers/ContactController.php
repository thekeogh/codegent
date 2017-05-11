<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Http\Requests\ContactForm;

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
    public function contacting(ContactForm $request)
    {
        Mail::send(new Contact($request->get('name'), $request->get('email'), $request->get('type'), $request->get('message')));
        return redirect()->to('/contact?sent=1');
    }
    
}
