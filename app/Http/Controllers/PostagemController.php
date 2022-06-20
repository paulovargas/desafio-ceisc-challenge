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

   

    public function destroy($id)
    {
        Postagem::find($id)->delete();
        return redirect(url('/home'));
    }

    public function edit($id)
    {   
        $postagem = Postagem::findOrFail($id);
        return view('editar',['postagem' => $postagem]);
    }
    public function update(Request $request, $id){
        $postagem = Postagem::findOrFail($id);
        $postagem->update([
            'titulo' =>$request->titulo,
            'descricao' =>$request->descricao,
            'imagem' =>$request->imagem,
            'ativa' =>$request->ativa,
        ]);
        return redirect(url('/home'));
    }
    public function publicar(Request $request, $id){
        $postagem = Postagem::findOrFail($id);
        $postagem->update([
            'ativa' =>'S',
        ]);
        return redirect(url('/home'));
    }

    public function abrir($id)
    {        
        $postagem = Postagem::findOrFail($id);
        return view('public_post',['postagem' => $postagem]);
    }    
}
