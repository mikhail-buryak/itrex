<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPictures()
    {
        $pictures = \App\Picture::orderBy('created_at', 'desc')->paginate(12);

        return view('pictures.index', ['pictures' => $pictures]);
    }
}
