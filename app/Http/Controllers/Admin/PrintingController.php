<?php

namespace App\Http\Controllers\Admin;

use App\Printing;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PrintingController extends Controller
{
    public function index()
    {
        $printings = Printing::orderBy('created_at', 'desc')->get();

        return view('admin.printings.index', [
            'printings' => $printings,
        ]);
    }

    public function create()
    {
        return view('admin.printings.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('img')->store('printings');

        Printing::create([
            'title'   => $request->title,
            'year'    => $request->year,
            'size'    => $request->size,
            'details' => $request->details,
            'img'     => $image
        ])->save();

        return redirect('/admin/printings')->with('success', 'Printing has been added');
    }

    public function edit($id)
    {
        $printing = Printing::find($id);

        return view('admin.printings.edit', compact('printing'));
    }

    public function update(Request $request, $id)
    {
        $printing = Printing::find($id);

        $input = Input::except(['_token']);

        if ($request->get('is_sold') == 0) {
            $printing->is_sold = 0;
            $printing->update($input);
        } else {
            $printing->is_sold = 1;
            $printing->update($input);
        }

        $printing->title   = $request->get('title');
        $printing->year    = $request->get('year');
        $printing->size    = $request->get('size');
        $printing->details = $request->get('details');

        $printing->save();

        return redirect('/admin/printings')->with('success', 'Printing has been updated');
    }

    public function destroy($id)
    {
        $printing = Printing::find($id);

        $printing->delete();

        return redirect('/admin/printings')->with('success', 'Printing has been deleted Successfully');
    }

}
