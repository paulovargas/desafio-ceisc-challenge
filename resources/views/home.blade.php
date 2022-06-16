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
                @foreach ($postagens as $postagem)

                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                      
                    </p>
                    <p>Título:  {{$postagem->titulo}}</p>
                    <p>Descrição:  {{$postagem->descricao}}</p>
                    <a href="{{ URL::to('postagem') }}" class="btn btn-primary">Leia mais</a>
                    <a href="{{ URL::to('/posts/editar') }}" class="btn btn-warning">Editar</a>
                    <a href="" class="btn btn-success">Publicar</a>
                    <a href="{{url('posts/deletar/'.$postagem->id)}}" class="btn btn-danger">Remover</a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editarTag" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url()->current().'/editar'}}" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Editar Tag</h4>
          </div>
          <div class="modal-body">
  
              {{ csrf_field() }}
              <input type="hidden" id="id" name="id">
              <div class="form-group">
                <label for="">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" placeholder="">
              </div>
  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
