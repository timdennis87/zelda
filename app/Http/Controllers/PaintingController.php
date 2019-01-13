<?php

namespace App\Http\Controllers;

use App\Painting;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::where('is_sold', 1)->get();

        return view('paintings', [
            'paintings' => $paintings,
        ]);
    }

    public function show(Painting $painting)
    {
        $previous = Painting::where('is_sold', 1)->where('id', '<', $painting->id)->first();
        $next     = Painting::where('is_sold', 1)->where('id', '>', $painting->id)->first();

        return view('show-painting', [
            'painting' => $painting,
            'previous' => $previous,
            'next'     => $next,
        ]);
    }
}
