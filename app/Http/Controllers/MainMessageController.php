<?php

namespace App\Http\Controllers;

use App\MainMessage;
use Illuminate\Http\Request;

class MainMessageController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        MainMessage::create([
            'name'    => $request->get('name'),
            'email'   => $request->get('email'),
            'phone'   => $request->get('phone'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ])->save();

        return redirect()->back()->with('message', 'Message has been sent');
    }

}
