<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postagem;

use App\Postagem as ModelPostagem;

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

    public function edit($id)
    {
        
        $id = Postagem::find($id);
        return redirect(url('/posts/editar'), compact($id));
    }

    public function postagem($id)
    {        
        $postId['id'] = $id;
        $posts['postagens'] = ModelPostagem::get();
        return view('public_post', $posts, $postId);
    }    
}
