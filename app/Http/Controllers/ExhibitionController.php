<?php

namespace App\Http\Controllers;

use App\Exhibition;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::orderBy('created_at', 'desc')->get();

        return view('exhibitions', [
            'exhibitions' => $exhibitions,
        ]);
    }
}
