@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($postagens as $postagem)

                <div class="card-header">{{$postagem->titulo}}</div>
        
                <div class="card-body">
                    <img src="..." class="card-img-top" alt="...">
                    <p class="card-text">{{$postagem->descricao}} </p>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
