<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function showHome()
    {   
        $dl = new DataLayer();
        $news = $dl->listNews();

        return view('index')->with('news', $news);
    }

    public function showNews()
    {
        return Redirect::to(route('home'));
    }
}
