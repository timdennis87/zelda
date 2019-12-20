<?php

namespace App\Http\Controllers;

use App\About;

class AboutController extends Controller
{
    public function aboutMe()
    {
        $aboutMe  = About::get();
        $linkInfo = $this->getLinkInformation();

        return view('about-me', [
            'aboutMe'  => $aboutMe,
            'linkInfo' =>$linkInfo
        ]);
    }

    public function getLinkInformation()
    {
        return \DB::table('useful_links')
            ->where('id', 1)
            ->first([
                'name',
                'details',
                'url'
            ]);
    }
}
