<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send(Request $request)  {
        $validation=$request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required',
        'description'=>'required'
        ]);
    
     Mail::to(config('mail.from.address'))
     ->send(new contactMail(
        $request->name,
        $request->email,
        $request->subject,
        $request->description,
     ))  ; 

     return response()->json([
        'message'=>'Email Sent'
     ]);
    }
}
