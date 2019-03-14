<?php

namespace App\Http\Controllers;

use App\Exhibition;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::orderBy('order_date', 'asc')->get();

        return view('exhibitions', [
            'exhibitions' => $exhibitions,
        ]);
    }
}