<?php

namespace App\Http\Controllers;

use App\Printing;

class PrintController extends Controller
{
    public function showPrints()
    {
        $printings = Printing::where('is_sold', 0)->get();

        return view('prints', [
            'printings' => $printings,
        ]);
    }

    public function showIndividualPrint(Printing $print)
    {
        $previous = Printing::where('is_sold', 0)
            ->where('id', '<', $print->id)
            ->first();

        $next = Printing::where('is_sold', 0)
            ->where('id', '>', $print->id)
            ->first();

        return view('show-print', [
            'print'    => $print,
            'previous' => $previous,
            'next'     => $next,
        ]);
    }
}
