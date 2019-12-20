<?php

namespace App\Http\Controllers\Admin;

use App\Exhibition;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ExhibitionController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::orderBy('created_at', 'desc')->get();

        return view('admin.exhibitions.index', [
            'exhibitions' => $exhibitions,
        ]);
    }

    public function create()
    {
        return view('admin.exhibitions.create');
    }

    public function store(Request $request)
    {
        Exhibition::create([
            'title'      => $request->get('title'),
            'details'    => $request->get('details'),
            'order_date' => $request->get('order_date'),
            'date'       => $request->get('date'),
            'time'       => $request->get('time'),
            'venue'      => $request->get('venue'),
            'address'    => $request->get('address'),
            'img'        => $request->file('img')->store('exhibitions'),
        ])->save();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been added');
    }

    public function edit($id)
    {
        $exhibition = Exhibition::find($id);

        return view('admin.exhibitions.edit', compact('exhibition'));
    }

    public function update(Request $request, $id)
    {
        $exhibition = Exhibition::find($id);

        $exhibition->title      = $request->get('title');
        $exhibition->order_date = $request->get('order_date');
        $exhibition->date       = $request->get('date');
        $exhibition->time       = $request->get('time');
        $exhibition->venue      = $request->get('venue');
        $exhibition->address    = $request->get('address');
        $exhibition->details    = $request->get('details');

        $exhibition->save();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been updated');
    }

    public function destroy($id)
    {
        $exhibition = Exhibition::find($id);

        $exhibition->delete();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been deleted Successfully');
    }

}
