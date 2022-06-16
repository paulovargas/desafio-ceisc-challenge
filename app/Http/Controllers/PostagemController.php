<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postagem;

class PostagemController extends Controller
{
    public function index()
    {
        return view('posts')->with('postagens',Postagem::get());

    }

    public function create()
    {
        return view('posts');
    }

    public function store(Request $request)
    {
        $postagem = new Postagem;
        $postagem->titulo = $request->input('titulo');
        $postagem->descricao = $request->input('descricao');
        $postagem->imagem = $request->input('imagem');
        $postagem->ativa = $request->input('ativa');
        $postagem->save();

        return redirect(url('/home'));
    }

    public function update(Request $request)
    {
        $postagem = Postagem::find($request->input('id'));
        $postagem->titulo = $request->input('titulo');
        $postagem->descricao = $request->input('descricao');
        $postagem->imagem = $request->input('imagem');
        $postagem->ativa = $request->input('ativa');
        $postagem->save();

        return redirect(url('posts'));
    }

    public function destroy($id)
    {
        Postagem::find($id)->delete();
        return redirect(url('/home'));
    }

    
}
