<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact()
    {
        $header = 'to jest naglowek strony kontakt';
        $date = '03/03/2020';
        $visited = 999999;
        return view('pages.contact', compact('header', 'date', 'visited'));
    }
    public function about()
    {
        return view('pages.about');
    }
}
