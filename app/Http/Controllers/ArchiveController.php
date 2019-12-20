<?php

namespace App\Http\Controllers;

use App\Printing;
use App\Painting;

class ArchiveController extends Controller
{
    public function index()
    {
        return view('archive');
    }

    public function archivePrints()
    {
        $printings = Printing::where('is_sold', 1)->get();

        return view('archive-prints',[
            'printings' => $printings
        ]);
    }

    public function archivePaintings()
    {
        $paintings = Painting::where('is_sold', 1)->get();

        return view('archive-paintings',[
            'paintings' => $paintings
        ]);
    }
}
