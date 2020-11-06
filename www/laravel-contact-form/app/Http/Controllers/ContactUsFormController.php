<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactUsFormController extends Controller
{
    //
    public function createForm(Request $request) {
	return view('contact');
    }

    public function ContactUsForm(Request $request) {
	$this->validate($request, [
	'name' => 'required',
	'email' => 'required|email',
	'phone' => 'required',
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
