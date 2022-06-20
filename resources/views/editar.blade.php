@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar postagem</div>

                <div class="card-body">
                    <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                    <br>
                    <b>|| Usar AJAX no submit e uma barra de progresso (envio em % ou bytes, qualquer comunicação de andamento) ||</b>

                    <form class="" action="{{ route('atualizar_post', ['id' => $postagem->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo" value="{{$postagem->titulo}}">
                            <br>
                            <label>Descrição</label>
                            <input type="text" class="form-control" name="descricao" value="{{$postagem->descricao}}">
                            <br>
                            <label>Imagem</label>
                            <input type="text" class="form-control" name="imagem" value ="{{$postagem->imagem}}">
                            <br>                        
                            <label>Ativa</label>
                            <select name="ativa" >
                            @if($postagem->ativa == 'S'){
                                <option value="S" selected>Sim</option>
                            }
                            @else<option value="N" selected>Não</option>
                            @endif
                            <option value="S" >Sim</option>
                            <option value="N" >Não</option>
                            </select>
                        </div>
                        <button type="submit">Salvar</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
