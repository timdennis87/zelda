<?php

namespace App\Http\Controllers\Admin;

use App\Exhibition;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $exhibitions = Exhibition::orderBy('created_at', 'desc')->get();


        return view('admin.exhibitions.index', [
            'exhibitions' => $exhibitions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exhibitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exhibition = new Exhibition([
            'title'   => $request->get('title'),
            'details' => $request->get('details'),
            'date'    => $request->get('date'),
            'time'    => $request->get('time'),
            'venue'   => $request->get('venue'),
            'address' => $request->get('address'),
            'img'     => $request->file('img')->store('exhibitions'),
        ]);

        $exhibition->save();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been added');
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
        $exhibition = Exhibition::find($id);

        return view('admin.exhibitions.edit', compact('exhibition'));
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
        $exhibition = Exhibition::find($id);

        $exhibition->title   = $request->get('title');
        $exhibition->date    = $request->get('date');
        $exhibition->time    = $request->get('time');
        $exhibition->venue   = $request->get('venue');
        $exhibition->address = $request->get('address');
        $exhibition->details = $request->get('details');

        $exhibition->save();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exhibition = Exhibition::find($id);

        $exhibition->delete();

        return redirect('/admin/exhibitions')->with('success', 'Exhibition has been deleted Successfully');
    }

}
