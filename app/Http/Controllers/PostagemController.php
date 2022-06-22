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
    public function upload(Request $request)
    {

        
        var_dump($titulo = $request->input('titulo'));
        var_dump($descricao = $request->input('descricao'));
        exit;
        //dd($request);
        //echo json_decode($_SERVER['RESQUEST_METHOD']); 

        /*
        if ($request -> ajax()) { 
            $jsonString = $request -> ajax(); 
        }
        $data = json_decode($jsonString); 
        */
        //dd($request -> ajax());
        //exit; 
        $postagem['success'] = true;
        $postagem['message'] =  'Ok';
        echo json_encode($postagem);
        dd($request);         
         
    }
    public function update(){

        //$postagem = Postagem::findOrFail($id);
        //$postagem->update([
        //    'titulo' =>$request->titulo,
        //    'descricao' =>$request->descricao,
        //    'imagem' =>$request->imagem,
        //    'ativa' =>$request->ativa,
        //]);
        //return redirect(url('/home'));
        $postagem['success'] = true;
        echo json_encode($postagem);
        //return 'Deu certo : ' + $postagem;
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
