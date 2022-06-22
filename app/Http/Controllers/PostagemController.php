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
        //$postagem = new Postagem;
        //$postagem->titulo = $request->input('titulo');
        //$postagem->descricao = $request->input('descricao');
        //$postagem->ativa = $request->input('ativa');
        //$postagem->save();

        return redirect(url('/home'));
    }/*
    public function store(Request $request)
    {
        $postagem = new Postagem;
        $postagem->titulo = $request->input('titulo');
        $postagem->descricao = $request->input('descricao');
        $postagem->ativa = $request->input('ativa');
        $postagem->save();

        return redirect(url('/home'));
    }*/

   

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
  
    public function novo(Request $request)
    {      
        $post = new Postagem;
        $post->titulo = (string)$request->input('titulo');
        $post->descricao = (string)$request->input('descricao');
        $post->ativa = (string)$request->input('postativa');
        $post->save();
        $response['success'] = true;
        $response['message'] =  'Dados salvos com sucesso!';
        echo json_encode($response);
       
    }
    public function update(Request $request)
    {
        $id = (string)json_decode($request->input('id'));
        $titulo = (string)$request->input('titulo');
        $descricao = (string)$request->input('descricao');
        $postativa = (string)$request->input('postativa');
        $post = new Postagem;
        $post->titulo = $titulo;
        $post->descricao = $descricao;
        $post->postativa = $postativa;
        $post = (object)$post;       
        $postagem = Postagem::findOrFail($id);
        $postagem->update([
            'titulo' => $post->titulo,
            'descricao' => $post->descricao,
            'ativa' => $post->postativa,
        ]);      
       
        $response['success'] = true;
        $response['message'] =  'Dados salvos com sucesso!';
        echo json_encode($response);
       
    }
    public function publicar($id){
        $postagem = Postagem::findOrFail($id);
        $postagem->update([
            'ativa' =>'S',
        ]);
        return redirect(url('/'));
    }

    public function abrir($id)
    {        
        $postagem = Postagem::findOrFail($id);
        return view('public_post',['postagem' => $postagem]);
    }    
}
