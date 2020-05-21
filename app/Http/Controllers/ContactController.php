<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function show()
   {
       return view('contact');
   }

   public function store()
   {
       // send email
       request()-> validate(['email' => 'required|email']);

       Mail::to(request('email'))->send(new Contact('Shirts'));
       
       return redirect('/contact')->with('message', 'Email sent!');

   }
}
