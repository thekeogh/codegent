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
        $captcha = $request->get("g-recaptcha-response");
        
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $fields = array(
        'secret'=>env('RECAPTCHA_SECRET'),
        'response'=>$captcha,
        'remoteip'=>$_SERVER['REMOTE_ADDR']
        );

        $postvars='';
        $sep='';
        foreach($fields as $key=>$value)
        {
        $postvars.= $sep.urlencode($key).'='.urlencode($value);
        $sep='&';
        }

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($ch);

        curl_close($ch);
        
        if (!json_decode($result)->success) {
          return redirect()->back()->with('captcha', 'Please confirm you are not a robot');
        }
        Mail::send(new Contact($request->get('name'), $request->get('email'), $request->get('type'), $request->get('message')));
        return redirect()->to('/contact?sent=1');
    }
    
}
