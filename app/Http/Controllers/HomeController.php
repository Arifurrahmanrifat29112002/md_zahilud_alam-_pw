<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\protfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $user_info = User::all();
        $protfolio_info = protfolio::paginate(10)->withQueryString();
        $categories = category::all();
        return view('frontend.view_main',compact('user_info','protfolio_info','categories'));
    }


    public function about()
    {
        $user_info = User::all();
        return view('frontend.about',compact('user_info'));
    }
    public function contact()
    {
        $user_info = User::all();
        return view('frontend.contact',compact('user_info'));
    }

    //send mail contact
    public function send(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
         ]);

         $data=[
            'recipient' =>'arifurrahmanrifat72@gmailm.com',
            'fromEmail' =>$request->email,
            'fromName' =>$request->name,
            'subject' =>$request->subject,
            'body' =>$request->message,
         ];
         Mail::send('email-template',$data, function($message) use ($data){
            $message->to($data['recipient'])
                    ->from($data['fromEmail'],$data['fromName'])
                    ->subject($data['subject']);
         });
         return back()->withSuccess('Email Send');



    }
}
