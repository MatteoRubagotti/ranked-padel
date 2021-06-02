<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function showHome()
    {   
        $dl = new DataLayer();
        $news = $dl->listNews();

        Debugbar::info($news);

        return view('index')->with('news', $news);
    }

    public function showNews()
    {
        return Redirect::to(route('home'));
    }
}
