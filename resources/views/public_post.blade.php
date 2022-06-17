@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($postagens as $postagem)
            @if($postagem->id == $id)
                <div class="card">
                    <div class="card-header">{{$postagem->titulo}}</div>            
                    <div class="card-body">
                        <img src="..." class="card-img-top" alt="...">
                        <p class="card-text">{{$postagem->descricao}} </p>
                    </div>                    
                </div>            
            @endif           
            @endforeach

        </div>
    </div>
</div>
@endsection
