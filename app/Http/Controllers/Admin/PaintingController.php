<?php

namespace App\Http\Controllers\Admin;

use App\Painting;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PaintingController extends Controller
{
    public function index()
    {
        $paintings = Painting::orderBy('created_at', 'desc')->get();

        return view('admin.paintings.index', [
            'paintings' => $paintings,
        ]);
    }

    public function create()
    {
        return view('admin.paintings.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->store('paintings');

        Painting::create([
            'title'   => $request->title,
            'year'    => $request->year,
            'size'    => $request->size,
            'details' => $request->details,
            'img'     => $image
        ])->save();

        return redirect('/admin/paintings')->with('success', 'Painting has been added');
    }

    public function edit($id)
    {
        $painting = Painting::find($id);

        return view('admin.paintings.edit', compact('painting'));
    }

    public function update(Request $request, $id)
    {
        $painting = Painting::find($id);

        $input = Input::except(['_token']);

        if ($request->get('is_sold') == 0) {
            $painting->is_sold = 0;
            $painting->update($input);
        } else {
            $painting->is_sold = 1;
            $painting->update($input);
        }

        $painting->title   = $request->get('title');
        $painting->year    = $request->get('year');
        $painting->size    = $request->get('size');
        $painting->details = $request->get('details');

        $painting->save();

        return redirect('/admin/paintings')->with('success', 'Painting has been updated');
    }

    public function destroy($id)
    {
        $painting = Painting::find($id);

        $painting->delete();

        return redirect('/admin/paintings')->with('success', 'Painting has been deleted Successfully');
    }

}
