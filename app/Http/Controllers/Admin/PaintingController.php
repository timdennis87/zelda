<?php

namespace App\Http\Controllers\Admin;

use App\Painting;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $paintings = Painting::orderBy('created_at', 'desc')->get();


        return view('admin.paintings.index', [
            'paintings' => $paintings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paintings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $painting = new Painting([
            'title'   => $request->get('title'),
            'year'    => $request->get('year'),
            'size'    => $request->get('size'),
            'details' => $request->get('details'),
            'img'     => $request->file('img')->store('paintings'),
        ]);


        $painting->save();

        return redirect('/admin/paintings')->with('success', 'Painting has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $painting = Painting::find($id);

        return view('admin.paintings.edit', compact('painting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $painting = Painting::find($id);

        $input = Input::except(['_token']);

        if ($request->get('is_sold') == '0') {
            $painting->is_sold = 1;
            $painting->update($input);
        } else {
            $painting->is_sold = 0;
            $painting->update($input);
        }

        $painting->title   = $request->get('title');
        $painting->year    = $request->get('year');
        $painting->size    = $request->get('size');
        $painting->details = $request->get('details');


        $painting->save();

        return redirect('/admin/paintings')->with('success', 'Painting has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $painting = Painting::find($id);

        $painting->delete();

        return redirect('/admin/paintings')->with('success', 'Painting has been deleted Successfully');
    }

}
