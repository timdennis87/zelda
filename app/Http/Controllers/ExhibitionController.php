<?php

namespace App\Http\Controllers;

use App\Exhibition;

class ExhibitionController extends Controller
{
    public function showExhibitions()
    {
        $exhibitions = Exhibition::orderBy('order_date', 'asc')->get();

        return view('exhibitions', [
            'exhibitions' => $exhibitions,
        ]);
    }
}