<?php

namespace App\Http\Controllers\Admin;

use App\Printing;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PrintingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $printings = Printing::orderBy('created_at', 'desc')->get();


        return view('admin.printings.index', [
            'printings' => $printings,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.printings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'year'=>'required',
            'size'=>'required',
            'details'=>'required',
            'img'=>'required',
        ]);

        $printing = new Printing([
            'title' => $request->get('title'),
            'year' => $request->get('year'),
            'size' => $request->get('size'),
            'details' => $request->get('details'),
            'img' => $request->file('img')->store('printings'),
        ]);


        $printing->save();

        return redirect('/admin/printings')->with('success', 'Printing has been added');
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
        $printing = Printing::find($id);

        return view('admin.printings.edit', compact('printing'));
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
        $request->validate([
            'title'=>'required',
            'year'=>'required',
            'size'=>'required',
            'details'=>'required',
        ]);

        $printing = Printing::find($id);
        $input = Input::except(['_token']);

        if ($request->get('is_sold') == '0') {
            $printing->is_sold = 1;
            $printing->update($input);
        } else {
            $printing->is_sold = 0;
            $printing->update($input);
        }

        $printing->title = $request->get('title');
        $printing->year = $request->get('year');
        $printing->size = $request->get('size');
        $printing->details = $request->get('details');


        $printing->save();

        return redirect('/admin/printings')->with('success', 'Printing has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $printing = Printing::find($id);

        $printing->delete();

        return redirect('/admin/printings')->with('success', 'Printing has been deleted Successfully');
    }

}
