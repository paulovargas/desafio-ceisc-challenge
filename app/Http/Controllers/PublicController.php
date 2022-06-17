<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem as ModelPostagem;


class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $array['postagens'] = ModelPostagem::get();
        return view('public', $array);
    }

    public function postagem()
    {
        return "Essa éa postagem";
        //$array['postagens'] = ModelPostagem::get();
        //return view('public', $array);
    }
}
