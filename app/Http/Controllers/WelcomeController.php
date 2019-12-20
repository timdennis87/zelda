<?php

namespace App\Http\Controllers;

use App\Exhibition;
use App\Painting;
use App\Printing;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $prints = Printing::where('is_sold', 0)
            ->orderBy('updated_at','desc')
            ->limit(4)
            ->get();

        $painting = Painting::where('is_sold', 0)
            ->orderBy('updated_at','desc')
            ->limit(4)
            ->get();

        $exhibitions = Exhibition::orderBy('order_date','asc')
            ->limit(1)
            ->get();

        return view('welcome', [
            'prints'      => $prints,
            'paintings'   => $painting,
            'exhibitions' => $exhibitions,
        ]);
    }
}