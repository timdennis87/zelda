<?php

namespace App\Http\Controllers;

use App\Exhibition;
use App\Painting;
use App\Printing;

class WelcomeController extends Controller
{
    public function index()
    {
        $prints = Printing::where('is_sold', 1)->orderBy('updated_at','desc')->limit(4)->get();
        $painting = Painting::where('is_sold', 1)->orderBy('updated_at','desc')->limit(4)->get();
        $exhibitions = Exhibition::orderBy('updated_at','desc')->limit(1)->get();

        return view('welcome', [
            'prints'      => $prints,
            'paintings'   => $painting,
            'exhibitions' => $exhibitions,
        ]);
    }
}
