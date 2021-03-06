<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactUsController extends Controller
{
    //
    public function createForm(Request $request) {
	return view('contact');
    }

    public function ContactUsForm(Request $request) {
	$this->valiadate($request, [
	'name' => 'required',
	'email' => 'required|email',
	'phone' => 'required|reqex:/^([0-9\s\-\+\(\)]*)$/|min:10)',
	'subject' => 'required',
	'message' => 'required'
	]);
    
    Contact::create($request->all());

     \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('ruzal.gabdrahmanoff@yandex.com', 'Admin')->subject($request->get('subject'));
        });

    return back()->with('success','Thank you for your contact. We have received it.');    
    
    }

}
