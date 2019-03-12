<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $information = About::get();

        return view('admin.about-me.index', [
            'information' => $information,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about-me.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new About([
            'info' => $request->get('info'),
            'img'  => $request->file('img')->store('about-me'),
        ]);

        $information->save();

        return redirect('/admin/about-me')->with('success', 'About me section has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = About::find($id);

        return view('admin.about-me.edit', compact('information'));
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
            'info' => 'required',
        ]);

        $information = About::find($id);

        $information->info = $request->get('info');

        $information->save();

        return redirect('/admin/about-me')->with('success', 'About me section has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $information = About::find($id);

        $information->delete();

        return redirect('/admin/about-me')
            ->with('success', 'About me section has been deleted Successfully');
    }

}