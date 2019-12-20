<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MainMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        return view('admin.index', [
            'unreadMessages' => $this->getAmountOfUnreadMessages()
        ]);
    }

    public function getAmountOfUnreadMessages()
    {
        return MainMessage::where('is_read', 0)
            ->get()
            ->count();
    }

}
