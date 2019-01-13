<?php

namespace App\Http\Controllers;

use App\Printing;
use App\Painting;

class SoldController extends Controller
{
    public function index()
    {
        return view('sold');
    }

    public function soldPrints()
    {
        $printings = Printing::where('is_sold', 0)
            ->get();

        return view('sold-prints', compact('printings'));
    }

    public function soldPaintings()
    {
        $paintings = Painting::where('is_sold', 0)
            ->get();

        return view('sold-paintings', compact('paintings'));
    }
}
