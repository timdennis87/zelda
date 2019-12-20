<?php

namespace App\Http\Controllers;

use App\Painting;

class PaintingController extends Controller
{
    public function showPaintings()
    {
        $paintings = Painting::where('is_sold', 0)->get();

        return view('paintings', [
            'paintings' => $paintings,
        ]);
    }

    public function showIndividualPainting(Painting $painting)
    {
        $previous = Painting::where('is_sold', 0)
            ->where('id', '<', $painting->id)
            ->first();

        $next = Painting::where('is_sold', 0)
            ->where('id', '>', $painting->id)
            ->first();

        return view('show-painting', [
            'painting' => $painting,
            'previous' => $previous,
            'next'     => $next,
        ]);
    }
}
