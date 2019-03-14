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
        $printings = Printing::where('is_sold', 0)
            ->get();

        return view('archive-prints', compact('printings'));
    }

    public function archivePaintings()
    {
        $paintings = Painting::where('is_sold', 0)
            ->get();

        return view('archive-paintings', compact('paintings'));
    }
}
