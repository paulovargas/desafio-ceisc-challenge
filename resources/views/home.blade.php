@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>

                <button type="button" class="btn btn-labeled btn-success col-2 m-2" onclick="window.location='{{ URL::to('posts/novo') }}'">
                    + Nova
                </button>

                <div class="card-body">
                    <b>|| Adicione aqui uma listagem de postagens, com botão de publicar e remover ||</b>
                </div>
                @foreach ($postagens as $postagem )

                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                      
                    </p>
                    <p>Título:  {{$postagem->titulo}}</p>
                    <p>Descrição:  {{$postagem->descricao}}</p>
                    <a href="{{ route('abrir_post', ['id'=>$postagem->id])}}" class="btn btn-primary">Leia mais</a>
                    <a href="{{ route('editar_post', ['id'=>$postagem->id])}}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('publicar_post', ['id'=>$postagem->id])}}" class="btn btn-success">Publicar</a>
                    <a href="{{url('posts/deletar/'.$postagem->id)}}" class="btn btn-danger">Remover</a>
                </div>           

                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection
