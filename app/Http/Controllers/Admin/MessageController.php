<?php

namespace App\Http\Controllers\Admin;

use App\MainMessage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = MainMessage::orderBy('is_read', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.messages.index', [
            'messages' => $messages,

        ]);
    }

    public function show(MainMessage $message)
    {

        return view('admin.messages.show', [
            'message'  => $message,
        ]);
    }

    public function update(Request $request, $message)
    {
        $message = MainMessage::find($message);
        $input = Input::except(['_token']);

        if ($request->get('is_read') == '0') {
            $message->is_read = 1;
            $message->update($input);
        } else {
            $message->is_read = 0;
            $message->update($input);
        }

        $message->save();

        return redirect('/admin/messages')->with('message', 'Message has been read');
    }

}
