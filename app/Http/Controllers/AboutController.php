<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $information = About::get();

        return view('about-me', [
            'information' => $information,
        ]);
    }
}
